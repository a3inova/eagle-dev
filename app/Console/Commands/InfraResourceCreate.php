<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\DBTable;

class InfraResourceCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'infra:resourceCreate {--r=} {--m=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create resource to system module.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tableName = strtoupper($this->option("r"));
        $resource = $this-> getResourceName(strtolower($this->option("r")));
        $module = strtolower($this->option("m"));
        
        if (empty($resource)) {
            return $this->warn("Atenção: Recurso não foi informado.");
        }

        if (empty($module)) {
            return $this->warn("Atenção: Módulo não foi informado.");
        }

        /** Testa se a tebela existe no banco */
        $dbTable = new DBTable();
        if (!$dbTable->exists($tableName)){
            return $this->warn("AtençãoX: Tabela ".$tableName." não existe no banco de dados.");
        }
        /**----------------------------------- */

        $this->info("Criando recurso ".$resource." do modulo ".$module);

        $fileModel = $this->createModel( $resource,  $module );
        
        $fileController = $this->createController( $resource,  $module );

        if (!empty($fileModel)){
            $this->info("Overiding table ".$resource);
            $this->configModel($tableName, $fileModel);
        }

        if (!empty($fileController)){
            $this->info("Setting methods ".$fileController);
            $this->configController($resource,  $module, $fileController);
        }

        return $this->info("Fim do processo de criação de recurso.");

    }

    /**
     * Cria model do recurso.
     */
    public function createModel( $model,  $local )
    {
        $modelsPath = "app/Models";
        $modelPath = $modelsPath."/".$local;        
        $modelName = $model;
        $fileName = $modelPath."/".$modelName.".php";

        $this->info("Criando Model ".$modelName." em ".$modelPath);

        if (!is_dir($modelsPath)){
            mkdir ($modelsPath, 0755);
        }

        if (!is_dir($modelPath)){
            mkdir ($modelPath, 0755);
        }

        if (file_exists($fileName))
        {
            $this->warn("Atenção: Model ".$modelName." já existe em ".$modelPath);
            return "";
        }

        $textConsole = exec("php artisan make:model Models/".$local."/".$modelName);
        $this->info("PHP Artisan: ".$textConsole);

        $this->info("Model ".$modelName." criado com sucesso em ".$modelPath);
        
        return $fileName;

    }

    /**
     * Cria model do recurso.
     */
    public function createController( $controller,  $local )
    {
        $controllersPath = "app/Http/Controllers";
        $controllerPath = $controllersPath."/".$local;
        $controllerName = $controller."Controller";
        $fileName = $controllerPath."/".$controllerName.".php";

        $this->info("Criando controller ".$controllerName." em ".$controllerPath);

        if (!is_dir($controllersPath)){
            mkdir ($controllersPath, 0755);
        }

        if (!is_dir($controllerPath)){
            mkdir ($controllerPath, 0755);
        }

        if (file_exists($fileName))
        {
            $this->warn("Atenção: Controller ".$controllerName." já existe em ".$controllerPath);
            return "";
        }

        $textConsole = exec("php artisan make:controller ".$local."/".$controllerName." --api");
        $this->info("PHP Artisan: ".$textConsole);

        $this->info("Controller ".$controllerName." criado com sucesso em ".$controllerPath);

        return $fileName;

    }

    private function getResourceName($resource)
    {
        $result = "";
        $partName = "";

        for ($i=0;$i<strlen($resource);$i++){
            if (substr($resource,$i,1) === "_"){
                $result = $result.ucfirst($partName);
                $partName = "";
            }
            else{
                $partName = $partName.substr($resource,$i,1);
            }
        }

        if (!empty($partName)){
            $result = $result.ucfirst($partName);
        }

        return $result;
    }

    public function configModel($table, $file){

        $hFile = fopen($file,'r+');

        if ($hFile == false)
        {
            die('Não foi possível ler o arquivo '.$file);
        }

        $buffer = "";
        $textFile = "";

        while (($buffer = fgets($hFile, 4096)) !== false) {
            if (strpos($buffer,"//") !== false){

                $textFile = $textFile."    //Indicates if the IDs are auto-incrementing.\n";
                $textFile = $textFile."    //public \$incrementing = false;\n\n";

                $textFile = $textFile."    //Desable timestamps.\n";
                $textFile = $textFile."    public \$timestamps = false;\n\n";
                
                $textFile = $textFile."    //Overiding table.\n";
                $textFile = $textFile."    protected \$table = '$table';\n\n";

                $textFile = $textFile."    //The primary key associated with the table.\n";
                $textFile = $textFile."    protected \$primaryKey = 'ID';\n\n";

                $textFile = $textFile."    //If primary key is not an integer.\n";
                $textFile = $textFile."    //protected \$keyType = 'string';\n\n";

                $textFile = $textFile."    //Attributes table.\n";
                $columnsList = $this->getFillableModel($table);
                $textFile = $textFile."    protected \$fillable = [\n";
                $textFile = $textFile.$columnsList."\n";
                $textFile = $textFile."                           ];\n\n";

            }
            else{
                $textFile = $textFile.$buffer;
            }
        }

        if (!feof($hFile)) {
            $this->warn("Erro: falha inexperada de fgets()");
        }
        //echo $textFile;
        fclose($hFile);

        //Reescrevendo o arquivo
        $hFile = fopen($file,'w+');
        fwrite($hFile, $textFile);
        fclose($hFile);

    }

    public function configController($model, $local, $file){

        $hFile = fopen($file,'r+');

        if ($hFile == false)
        {
            die('Não foi possível ler o arquivo '.$file);
        }

        $buffer = "";
        $textFile = "";
        $fncName = "";

        while (($buffer = fgets($hFile, 4096)) !== false) {
            
            if (strpos($buffer,"use Illuminate\Http\Request") !== false){
                $textFile = $textFile."use App\Models\\".$local."\\".$model.";\n";
            }
            
            if (strpos($buffer,"function index") !== false){
                $fncName = "index";
            }
            elseif (strpos($buffer,"function show") !== false){
                $fncName = "show";
            }
            elseif (strpos($buffer,"function store") !== false){
                $fncName = "store";
            }
            elseif (strpos($buffer,"function update") !== false){
                $fncName = "update";
            }
            elseif (strpos($buffer,"function destroy") !== false){
                $fncName = "destroy";
            }

            if ((strpos($buffer,"//") !== false) && ($fncName === "index")){
                $textFile = $textFile."        return ".$model."::all();\n";
            }
            elseif ((strpos($buffer,"//") !== false) && ($fncName === "show")){
                $textFile = $textFile."        return ".$model."::findOrFail(\$id);\n";
            }
            elseif ((strpos($buffer,"//") !== false) && ($fncName === "store")){
                $textFile = $textFile."        return ".$model."::create(\$request->all());\n";
            }
            elseif ((strpos($buffer,"//") !== false) && ($fncName === "update")){
                $textFile = $textFile."        ".$model."::findOrFail(\$id)->update(\$request->all());\n";
                $textFile = $textFile."        return ".$model."::findOrFail(\$id);\n";
            }
            elseif ((strpos($buffer,"//") !== false) && ($fncName === "destroy")){
                $textFile = $textFile."        ".$model."::findOrFail(\$id)->delete();\n";
                $textFile = $textFile."        return '0';\n";
            }

            if (strpos($buffer,"//") == false){
                $textFile = $textFile.$buffer;
            }

        }

        if (!feof($hFile)) {
            $this->warn("Erro: falha inexperada de fgets()");
        }
        //echo $textFile;
        fclose($hFile);

        //Reescrevendo o arquivo
        $hFile = fopen($file,'w+');
        fwrite($hFile, $textFile);
        fclose($hFile);

    }

    private function getFillableModel($table)
    {
        $result = "";

        $columns = \Illuminate\Support\Facades\DB::select("DESC {$table}");
        
        foreach ($columns as $column) {
            $bField = true;
            foreach ($column as $key => $value){
                if ($bField) {
                    $result = $result."                           '".$value."',\n";
                }
                $bField = false;
            }
        }

        return $result;

    }

}
