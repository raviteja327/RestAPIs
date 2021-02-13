<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Organisationtypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->delete();
        \DB::table('organisation_industry_types')->delete();
        \DB::table('organisation_types')->delete();
        \DB::table('admin_users')->delete();
        \DB::table('security_questions')->delete();

       


        \DB::table('admin_users')->insert([
            'a_hash' => '4636380',
            'a_email' =>rand(10,11).'@gmail.com',
            'a_password' => Hash::make('password'),
            'a_name'=>'Admin'
        ]);

        \DB::table('organisation_types')->insert([
            'org_type_hash'=>"123456789",
            'org_type_name'=>'IT',
            'org_type_desc'=>'This is IT Oraganisation types',
            'a_hash'=>'4636380'
        ]);

        \DB::table('organisation_industry_types')->insert([
            'org_indus_type_hash'=>"1234567891",
            'org_indus_type_name'=>'Software Company',
            'org_indus_type_desc'=>'Software company provides custmsoftware development',
            'a_hash'=>'4636380',
            'org_type_hash'=>"123456789"
        ]);

        \DB::table('companies')->insert([
            'company_hash'=>sha1('Kalai info logic Private Limited'),
            'company_name'=>'Kalai info logic Private Limited',
            'company_email'=>'ranjith@kalai.info',
            'c_token'=>md5('Kalai info logic Private Limited'),
            'c_hash'=>sha1('ranjith@kalai.info'),
            'c_sec_key'=>md5(sha1('Kalai info logic Private Limited')),
            'a_hash'=>'4636380',
            'org_type_hash'=>"123456789",
            'org_indus_type_hash'=>"1234567891",
            'application_type'=>'store',
            'password_cnf'=>md5('Rachana12@')
        ]);

        \DB::table('security_questions')->insert([
            'security_question_hash' => md5('What is your nick name?'),
            'security_question' => 'What is your nick name?',
            // 'employee_hash' => md5('ranjith@kalai.info')
        ]);

        \DB::table('security_questions')->insert([
            'security_question_hash' => md5('What is your favourite place?'),
            'security_question' => 'What is your favourite place?',
            // 'employee_hash' => md5('ranjith@kalai.info')
        ]);

    }
}
