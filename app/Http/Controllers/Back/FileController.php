<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\File;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function FileView()
    {
        $files = File::all();
        return view('back.file.view_file', compact('files'));
    }

    public function FileAdd()
    {
        return view('back.file.add_file');
    }

    public function FileStore(Request $request)
    {
        if($request->has('csv'))
        {
            $csvData = array_map('str_getcsv', file($request->csv));
            $uploadedFile = [];
            $uploadedFile['file_name'] = time().$request->csv->getClientOriginalName();
            $uploadedFile['total_upload'] = count($csvData)-1;
            $csv = [];
            $header = [];
            $numberOfInsertedData = 0;

            foreach($csvData as $key => $data){
                if ($key === 0){
                    $header = $data;
                } else {
                    if(!empty($data[0])){
                        preg_match('/^((\+1|1))?[0-9]{10}/', $data[0], $matches);
                        if(!empty($matches)){
                            $csv[] = implode(',' , $data)."\n";
                            $numberOfInsertedData++;
                        }
                    }
                }

            }

            $uploadedFile['total_processed'] = $numberOfInsertedData;

            //chunking file
            $chunks = array_chunk($csv,100);
            $path = resource_path('temp');
            $fileNames = [];
            //convert chunk to new csv file
            foreach ($chunks as $key => $chunk) {
                $index = $key+1;
                $name = "/Sample_{$index}.csv";
                $fileNames[] = $name;
                file_put_contents($path.$name,$chunk);
            }

            //getting all the file inside the directories
            $u_file = File::create($uploadedFile);
            foreach ($fileNames as $key => $file) {
                $filePath = glob($path.$file)[0];
                $contactData = array_map('str_getcsv', file($filePath));
                $groupName = basename($file, '.csv');
                $group = Group::firstOrCreate([
                    "name" => $groupName,
                    "file_id" => $u_file->id,
                ]);
                foreach ($contactData as $d) {
                    $contact = array_combine($header, $d);
                    $contact['group_id'] = $group->id;
                    Contact::create($contact);
                }

                unlink($filePath);
            }

            return redirect()->route('file_group.all')->with('success', 'All Data Uploaded Successfully!');
        }
        return "please upload csv file";


    }

    public function FileGroup(File $file)
    {
        return view('back.file.modal')->with('groups', $file->groups);
    }

    public function FileGroupContacts(Group $group)
    {
        return view('back.file.group_wise_data_show')->with('contacts', $group->contacts);
    }

}
