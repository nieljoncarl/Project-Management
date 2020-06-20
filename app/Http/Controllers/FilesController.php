<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\File;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::where('user_id', Auth::id())->get();
        return view('file.index')->with('files', $files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'uploadedFiles'=>'required',
        ]);
        
        if($request->hasFile('uploadedFiles'))
        {
            $allowedfileExtension=['pdf','jpg','png','docx','csv','mp4', 'CSV','PDF','zip','ZIP','exe','EXE','jpeg','xls','xlsx'];
            $files = $request->file('uploadedFiles');
            $uploadedFiles = 0;
            foreach($files as $file)
            {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                
                if($check)
                {
                    $name=$file->getClientOriginalName();
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStoreTime = $filename.'_'.time().'.'.$extension;
                    $fileNameToStore = preg_replace('/\s+/', '_', $fileNameToStoreTime);
                    $path = $file->storeAs('public/uploadedFiles/'.$request->input('project_id').'/', $fileNameToStore);
                    $bytes = filesize($file);
                    $type = $file->getMimeType();
                    $fileupload = new File;
                    $fileupload->project_id = $request->input('project_id');
                    $fileupload->activity_id = $request->input('activity_id');
                    $fileupload->meeting_id = $request->input('meeting_id');
                    $fileupload->filename = ucwords($filenameWithExt);
                    $fileupload->filesize = $bytes;
                    $fileupload->filetype = $type;
                    $fileupload->file = $fileNameToStore;
                    $fileupload->user_id = auth()->user()->id;
                    $fileupload->save();

                    $uploadedFiles++;

                    
                }
                else
                {
                    return back()->with('error','Invalid File Format!');
                }
                
            }
            if($uploadedFiles>1)
            {
                return back()->with('success','Files Uploaded');
            }
            else
            {
                return back()->with('success','File Uploaded');
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
