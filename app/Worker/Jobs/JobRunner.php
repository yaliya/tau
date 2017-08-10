<?php

namespace Tau\Worker\Jobs;

use Tau\Worker\Job;

class JobRunner implements Job
{
	public function run() 
	{
		//Code
		(new TestJob)->run();

		return "Job completed \n";
	}
};