<?php 

namespace Tau\Worker;

use Tau\Database;

class Queue 
{
	protected $jobs = [];

	public function __construct() 
	{
		$dotenv = new \Dotenv\Dotenv(str_replace("app", "", realpath(dirname(__DIR__))));

		$dotenv->overload();

		Database::init([
			'driver'    => getenv("DB_DRIVER"),
			'host'      => getenv("DB_HOST"),
			'database'  => getenv("DB_NAME"),
			'username'  => getenv("DB_USER"),
			'password'  => getenv("DB_PASS")
	    ]);
	}

	public function add($job) 
	{
		$this->jobs[] = $job;
	}

	public function process() 
	{
		$args = $_SERVER['argv'];

		if(isset($args[1])) {

			if($args[1] == "run:job") {

				$classname 	= $args[2];

				if(!class_exists($classname)) {
					$classname = "Tau\\Worker\\Jobs\\".$classname;
				}

				echo call_user_func(array($classname, "run"));
			}

			if($args[1] == "queue:work") {

				foreach($this->jobs as 	$job) {

					echo $job->run();
				}
			}

			if($args[1] == "make:job") {

				if(isset($args[2])) {

					$contents = "<?php\n\n";
					$contents .= "namespace Tau\Worker\Jobs;\n\n";
					$contents .= "use Tau\Worker\Job\n\n";
					$contents .= "class ".$args[2]." implements Job\n";
					$contents .= "{\n";
					$contents .= "\tpublic function run() \n\t{\n";
					$contents .= "\t\t//Code\n";
					$contents .= "\t}\n";
					$contents .= "};";

					file_put_contents(__DIR__."/Jobs/".ucfirst($args[2]).".php", $contents);
				}
			}

			if($args[1] == "make:controller") {

				if(isset($args[2])) {

					$contents = "<?php\n\n";
					$contents .= "namespace Tau\Controllers;\n\n";
					$contents .= "use Tau\Http\Request;\n";
					$contents .= "use Tau\Http\Response;\n\n";
					$contents .= "class ".$args[2]."\n";
					$contents .= "{\n";
					$contents .= "\tpublic function index() \n\t{\n";
					$contents .= "\t\t//Code\n";
					$contents .= "\t}\n";
					$contents .= "};";

					file_put_contents(__DIR__."/../Controllers/".ucfirst($args[2]).".php", $contents);
				}
			}

			if($args[1] == "make:model") {

				if(isset($args[2])) {

					$contents = "<?php\n\n";
					$contents .= "namespace Tau\Models;\n\n";
					$contents .= "use Illuminate\Database\Eloquent\Model;\n\n";
					$contents .= "class ".$args[2]." extends Model\n";
					$contents .= "{\n";
					$contents .= "\t//Code\n";
					$contents .= "};";

					file_put_contents(__DIR__."/../Models/".ucfirst($args[2]).".php", $contents);
				}
			}

			if($args[1] == "make:middleware") {

				if(isset($args[2])) {

					$contents = "<?php\n\n";
					$contents .= "namespace Tau\Middlewares;\n\n";
					$contents .= "class ".$args[2]."\n";
					$contents .= "{\n";
					$contents .= "\tpublic function request() \n\t{\n";
					$contents .= "\t\t//Code\n";
					$contents .= "\t}\n";
					$contents .= "};";

					file_put_contents(__DIR__."/../Middlewares/".ucfirst($args[2]).".php", $contents);
				}
			}
		}
	}

	public static function work($job)
	{
		$classname 	= get_class($job);

		$worker 	= str_replace("app", "", realpath(dirname(__DIR__)))."/worker";

		return exec("php '$worker' run '$classname'");
	}
};