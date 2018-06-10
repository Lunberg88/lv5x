<?php

use Illuminate\Database\Seeder;

class CoreSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('core_settings')->delete();
        $option_stacks = [
            [
                'id' => 1,
                'key' => 'homepage_headline_text',
                'value' => 'recruiteriia',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 2,
                'key' => 'homepage_headline_description',
                'value' => 'Recruting and sourcing IT talents',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 3,
                'key' => 'homepage_aboutme_text',
                'value' => 'Offering a full range of recruitment services, we competently deal with all issues in the field of human resources management, which allows our clients to focus on their core businesses.&nbsp;<br /><br />Let me briefly introduce myself; I&rsquo;m Iia Mizina, e<span class="lt-line-clamp__line"><span class="lt-line-clamp__line"><span class="lt-line-clamp__line">xperienced IT Talent Manager with a demonstrated history of working in the staffing and recruiting. I am flexible, well organized and skilled recruiter. I love to help IT companies with their recruitment process. I understand and take into account how people feel and what they are looking for. <br /><br />My career started with position researcher at one international recruitment agency.&nbsp;This job was in the office. My team consisted of my HR director and me.&nbsp;</span></span></span><span class="lt-line-clamp__line"><span class="lt-line-clamp__line">It was my first recruiting school:)&nbsp;</span></span>Recruitment was one of my responsibilities. We advertised externally and waited for CVs. Then I looked over all the CVs and drawn up a shortlist of candidates for interview. In the interview I asked a lot of questions to understand the candidate. To select the right candidates, we looked into their background and sometimes checked their references.
<p><br />Business had really taken off at our company, so we needed to take on more staff. I was promoted to recruiter and then to headhunter.&nbsp;</p>
<p>I was working there 2 years and then I decided it was the time to move on. I have started to work in IT industry remotely. Currently I have around 3 years of hands-on experience in IT recruitment. I am working with different clients like independet specials or in a team.&nbsp;</p>',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 4,
                'key' => 'homepage_company_description',
                'value' => 'Offering a full range of recruitment services, we competently deal with all issues in the field of human resources management, which allows our clients to focus on their core businesses.&nbsp;',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 5,
                'key' => 'main_stacks',
                'value' => 'Frontend, Backend, FullStack, Mobile, Design, Traders, DevOps, Project Manager, Product Manager, Sales Manager, CTO',
                'created_at' => null,
                'updated_at' => null

            ]
        ];
        DB::table('core_settings')->insert($option_stacks);
    }
}
