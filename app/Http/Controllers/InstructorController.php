<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor_93039;
use App\Http\Resources\Instructor_93039 as InstructorResource;

class InstructorController extends Controller
{
     	public function index()
    {
        //Get All Instructors
        $instructors = Instructor_93039::paginate(100);

        //Return A collection of instructors as A Resource
        return InstructorResource::collection($instructors);
    }
}
