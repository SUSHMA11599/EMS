<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function submitIssue(Request $req)
    {

        $issue = new issue;
        $issue->emp_id = $req->emp_id;
        $issue->issue_type = $req->issue_type;
        $issue->issue_desc = $req->issue_desc;
        $issue->status = "pending";
        $issue->save();
        return "issue submit success";
    }

   
}