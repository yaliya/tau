<?php 

namespace Tau\Worker\Jobs;

use Tau\Worker\Job;

class ClearDB implements Job 
{
	public function run() {
		try {
			//Initialize new soap client with remote web sevice url
			$client = new \SoapClient(getenv("WS_URL")."/SystemService.svc?wsdl");
			//Do login request to SystemService
			$loginRequest = $client->Login([
				//With request
				"request" => [
					//With username from env data
					"UserName" => getenv("WS_JOBUSER_USERNAME"),
					//With password from env data
					"Password" => getenv("WS_JOBUSER_PASSWORD"),
				]
			]);

			//Get session from login result
			$session = $loginRequest->LoginResult->Session;
			//Initialize new soap client to project service url
			$client = new \SoapClient(getenv("WS_URL")."/ProjectService.svc?wsdl");
			//Do Get expert reports request to ProjectService
			$projectsRequest = $client->GetExpertReportsByProjectRessourcesSql([
				//With request
				"request" => [
					//With project statuses
				  "ProjectStatuses"   => [1118],
				  //With project ressources
				  "ProjectRessources" => ["PA-Mitglied_1", "PA-Mitglied_2", "PA-Mitglied_3", "PA-Mitglied_4"],
				  //With authorized session
				  "Session"           => $session
				]
			]);

			//Get WsExpertReport facade from get expert reports result
			$expertReportFacade = $projectsRequest->GetExpertReportsByProjectRessourcesSqlResult->SearchResult->WsExpertReportFacade;
			//If result is single object
			if(!is_array($expertReportFacade)) {
				//Convert result to array
				$expertReportFacade = [$expertReportFacade];
			}

			//If no projects were returned
			if(sizeof($expertReportFacade) == 0) {
				//Delete all votes from local database
				Tau\Models\Vote::getQuery()->delete();
				//Delete all projects from local database
				Tau\Models\Project::getQuery()->delete();
			}

			//Return successfull message
			return "Job successfully completed \n";
		}
		catch(\Exception $e) {
			//Return error message
			return $e->getMessage()."\n";
		}
	}
};