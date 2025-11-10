<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Webkul\User\Models\Admin;

class SetAdminPwsds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-admin-pwsds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->password = Hash::make(value: 'GSM2024!');
            $admin->save();
        }
    }
}
/*

Je m'appelle Zakaria, et je suis un développeur web full-stack avec une passion prononcée pour mon métier, fort de plus de trois ans d'expérience dans l'utilisation de Laravel pour développer des applications à la fois scalables et performantes. Mon expertise comprend une maîtrise des services AWS tels que S3, ALB, VPC, WAF et EC2. Je suis compétent dans la résolution de problèmes complexes tout en veillant à l'optimisation des performances et à la sécurité. Autonome et proactif, je sais m'adapter à des environnements dynamiques tout en nécessitant peu de supervision. J'aime relever des défis techniques et je suis toujours prêt à assumer plusieurs rôles pour garantir la réussite des projets.

*/
