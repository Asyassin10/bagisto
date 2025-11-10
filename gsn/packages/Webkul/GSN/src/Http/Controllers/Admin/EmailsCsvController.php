<?php

namespace Webkul\Admin\Http\Controllers;

use App\Notifications\EditorAccountCreationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Webkul\User\Repositories\AdminRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;

class EmailsCsvController extends Controller
{
    public function __construct(
        protected AdminRepository $adminRepository,
    ) {}
    public function postCsv(Request $request)
    {
        if (request()->hasFile('image')) {
            $file = $request->file('image')[0];


            $csvData = $file->get();
            $rows = explode("\n", $csvData);
            array_shift($rows);

            // Process the CSV data here...
            $password_list = [];
            foreach ($rows as $data_app) {
                $email_name = explode(",", $data_app);

                if ($data_app != "") {
                    if (!$this->adminRepository->checkIfAdminExistsByEmail($email_name[0])) {
                        //$name = explode('@', $email);
                        $random_pwd = Str::random(20);
                        $password = Hash::make($random_pwd);
                        $password_list[] = $random_pwd;
                        $data = [
                            'name' => $email_name[1],
                            'email' => $email_name[0],
                            'password' => $password,
                            'role_id' => 3, // Replace with the desired role ID
                            'status' => 1, // Replace with the desired status (1 for active, 0 for inactive)
                        ];
                        $admin = $this->adminRepository->create($data);
                        $admin->notify(new EditorAccountCreationNotification($email_name[0], $random_pwd));
                        Event::dispatch('user.admin.create.after', $admin);
                    }
                }
            }

            /*    $reader = Reader::createFromString($csvData);

            $records = $reader->getRecords(); // Get all records */

            return response()->json([
                'message' => 'CSV files uploaded successfully',
                "password_list" => $password_list
            ], 200);
        } else {
            return response()->json([
                'message' => 'No file uploaded.',
            ], 400);
        }
    }
}
