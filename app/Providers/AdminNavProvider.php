<?php

namespace App\Providers;

use App\Models\ItemCategory;
use App\Models\ContentCategory;
use Illuminate\Support\ServiceProvider;

class AdminNavProvider extends ServiceProvider
{
    public function boot()
    {
        $admin_nav = [
            [
                'title' => 'Dashboard',
                'icon' => 'fa fa-dashboard',
                'id' => 'dashboard',
                'dropdown' => [],
                'url' => route('admin.dashboard.index'),
                'role' => ['0', '1', '2', '3', '4','5'],
                'visible' => true
            ],
            [
                'title' => 'Slider',
                'icon' => 'fa fa-dashboard',
                'id' => 'slider',
                'dropdown' => [],
                'url' => route('admin.slider.index'),
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Client',
                'icon' => 'fa fa-dashboard',
                'id' => 'client',
                'dropdown' => [],
                'url' => route('admin.client.index'),
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Team',
                'icon' => 'fa fa-dashboard',
                'id' => 'team',
                'dropdown' => [],
                'url' => route('admin.team.index'),
                'role' => ['0'],
                'visible' => false
            ],
            [
                'title' => 'Content',
                'icon' => 'fa fa-dashboard',
                'id' => 'content',
                'dropdown' => $this->getContentDropdown(),
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Portfolio',
                'icon' => 'fa fa-dashboard',
                'id' => 'portfolio',
                'dropdown' => [
                    [
                        'title' => 'Category',
                        'id' => 'portfolio_category',
                        'url' => route('admin.portfolio.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'List',
                        'id' => 'portfolio_list',
                        'url' => route('admin.portfolio.post.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Project',
                'icon' => 'fa fa-dashboard',
                'id' => 'project',
                'dropdown' => [
                    [
                        'title' => 'Category',
                        'id' => 'project_category',
                        'url' => route('admin.project.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'List',
                        'id' => 'project_list',
                        'url' => route('admin.project.post.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Item',
                'icon' => 'fa fa-dashboard',
                'id' => 'item',
                'dropdown' => $this->getItemDropdown(),
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'Profile',
                'icon' => 'fa fa-user',
                'id' => 'profile',
                'dropdown' => [],
                'url' => url('/admin/registered-profile'),
                'role' => ['1'],
                'visible' => true
            ],
            [
                'title' => 'Message',
                'icon' => 'fa fa-envelope',
                'id' => 'message',
                'dropdown' => [],
                'url' => '',
                'role' => ['1'],
                'visible' => false
            ],
            [
                'title' => 'Result',
                'icon' => 'fa fa-tasks',
                'id' => 'result',
                'dropdown' => [],
                'url' => '',
                'role' => ['1'],
                'visible' => false
            ],
            [
                'title' => 'Certificate',
                'icon' => 'fa fa-certificate',
                'id' => 'certificate',
                'dropdown' => [],
                'url' => '',
                'role' => ['1'],
                'visible' => false
            ],
            [
                'title' => 'Blog',
                'icon' => 'fa fa-dashboard',
                'id' => 'blog',
                'dropdown' => [
                    [
                        'title' => 'Category',
                        'id' => 'blog_category',
                        'url' => route('admin.blog.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Post',
                        'id' => 'blog_post',
                        'url' => route('admin.blog.post.index'),
                        'role' => ['0', '1'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0', '1'],
                'visible' => true
            ],
            [
                'title' => 'Download',
                'icon' => 'fa fa-dashboard',
                'id' => 'download',
                'dropdown' => [],
                'url' => route('admin.download.index'),
                'role' => ['0'],
                'visible' => false
            ],
            [
                'title' => 'Gallery',
                'icon' => 'fa fa-dashboard',
                'id' => 'gallery',
                'dropdown' => [],
                'url' => route('admin.gallery.index'),
                'role' => ['0'],
                'visible' => false
            ],
            [
                'title' => 'Job',
                'icon' => 'fa fa-tasks',
                'id' => 'job',
                'dropdown' => [
                    [
                        'title' => 'Job List',
                        'id' => 'job_list',
                        'url' => route('admin.job.list.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Job Post',
                        'id' => 'job_post',
                        'url' => route('admin.job.post.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Job Application',
                        'id' => 'job_application',
                        'url' => route('admin.job.application.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => false
            ],
            [
                'title' => 'Registrations',
                'icon' => 'fa fa-tasks',
                'id' => 'job',
                'dropdown' => [
                    [
                        'title' => 'Approved',
                        'id' => 'approved',
                        'url' => route('admin.registration.index', ['filter' => 1]),
                        'role' => $this->roundStatus(11),
                        'visible' => true
                    ],
                    [
                        'title' => 'Unapproved',
                        'id' => 'unapproved',
                        'url' => route('admin.registration.index', ['filter' => 0]),
                        'role' => ['0','2','3','4'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => $this->roundStatus(13),
                'visible' => true
            ],
            
             [
                'title' => 'Round',
                'icon' => 'fa fa-tasks',
                'id' => 'job',
                'dropdown' => [
                    [
                        'title' => 'Upazila Round Waiting',
                        'id' => 'round1',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 1]),
                        'role' => $this->roundStatus(1),
                        'visible' => true,
                    ],
                    [
                        'title' => 'Upazila Round Select',
                        'id' => 'round2',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 2]),
                        'role' => $this->roundStatus(2),
                        'visible' => true,
                    ],
                    [
                        'title' => 'District Round waiting',
                        'id' => 'round3',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 3]),
                        'role' => $this->roundStatus(3),
                        'visible' => true,
                    ],
                    [
                        'title' => 'District Round Select',
                        'id' => 'round4',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 4]),
                        'role' => $this->roundStatus(4),
                        'visible' => true,
                    ],
                    [
                        'title' => 'Division Round waiting',
                        'id' => 'round5',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 5]),
                        'role' => $this->roundStatus(5),
                        'visible' => true,
                    ],
                    [
                        'title' => 'Division Round Select',
                        'id' => 'round6',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 6]),
                        'role' => $this->roundStatus(6),
                        'visible' => true,
                    ],
                    [
                        'title' => 'National Round waiting',
                        'id' => 'round7',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 7]),
                        'role' => $this->roundStatus(7),
                        'visible' => true,
                    ],
                    [
                        'title' => 'National Round Select',
                        'id' => 'round8',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 8]),
                        'role' => $this->roundStatus(8),
                        'visible' => true,
                    ],
                    [
                        'title' => 'National Finalist waiting',
                        'id' => 'round9',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 9]),
                        'role' => $this->roundStatus(9),
                        'visible' => true,
                    ],
                    [
                        'title' => 'National Finalist Select',
                        'id' => 'round10',
                        'url' => route('admin.registration.index', ['filter' => 1,'round' => 10]),
                        'role' => $this->roundStatus(10),
                        'visible' => true,
                    ]
                ],
                'url' => '',
                'role' => ['0','5'],
                'visible' => true
            ],
            [
                'title' => 'Settings',
                'icon' => 'fa fa-user',
                'id' => 'settings',
                'dropdown' => [
                    [
                        'title' => 'Users',
                        'id' => 'user_settings',
                        'url' => route('admin.user.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Site',
                        'id' => 'site_settings',
                        'url' => route('admin.setting.site.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Contact',
                        'id' => 'contact_settings',
                        'url' => route('admin.setting.contact.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Seo',
                        'id' => 'seo_settings',
                        'url' => route('admin.setting.seo.index'),
                        'role' => ['0'],
                        'visible' => true
                    ]
                ],
                'url' => '',
                'role' => ['0'],
                'visible' => true
            ],
            [
                'title' => 'System',
                'icon' => 'fa fa-dashboard',
                'id' => 'system',
                'dropdown' => [
                    [
                        'title' => 'Content',
                        'id' => 'system_content',
                        'url' => route('admin.content.category.index'),
                        'role' => ['0'],
                        'visible' => true
                    ],
                    [
                        'title' => 'Item',
                        'id' => 'system_item',
                        'url' => route('admin.item.category.index'),
                        'role' => ['0'],
                        'visible' => false
                    ]
                ],
                'url' => '',
                'role' => 'super_admin',
                'visible' => false
            ]
        ];

        view()->share('admin_nav', json_decode(json_encode($admin_nav)));
    }
    
    public function roundStatus($type){
        return ['0','2','3','4','5'];
        $user = auth()->user();
        if($user['type']==5){
            if(($type==13 || $type==11) && ($user['geo_upazila_id']!=null || $user['geo_upazila_id']!='')){
                return ['0','2','3','4','5'];
            }
            if(($type==1 || $type==2) && ($user['geo_upazila_id']!=null || $user['geo_upazila_id']!='')){
                return ['0','5'];
            }
            if(($type==3 || $type==4) && ($user['geo_district_id']!=null || $user['geo_district_id']!='')){
                return ['0','5'];
            }
            if(($type==5 || $type==6) && ($user['geo_division_id']!=null || $user['geo_division_id']!='')){
                return ['0','5'];
            }
            if(($type==7 || $type==8) && ($user['geo_division_id']==null || $user['geo_division_id']=='')){
                return ['0','5'];
            }
            if(($type==9 || $type==10) && ($user['geo_division_id']==null || $user['geo_division_id']=='')){
                return ['0','5'];
            }
        }
        if($type==13 || $type==11 || $type==12){
            return ['0','2','3','4','5'];
        }
        return ['0'];
        
    }

    public function getContentDropdown()
    {
        // content categories
        $content_categories = ContentCategory::all();
        $content_dropdown = [];

        foreach ($content_categories as $content_category)
        {
            $data = [
                'title' => $content_category->title,
                'id' => snake_case($content_category->title),
                'url' => route('admin.content.category.post.index', ['id' => $content_category->id]),
                'role' => ['0']
            ];

            array_push($content_dropdown, $data);
        }

        return $content_dropdown;
    }

    public function getItemDropdown()
    {
        // item categories
        $item_categories = ItemCategory::all();
        $item_dropdown = [];

        foreach ($item_categories as $item_category)
        {
            $data = [
                'title' => $item_category->title,
                'id' => snake_case($item_category->title),
                'url' => route('admin.item.category.post.index', ['id' => $item_category->id]),
                'role' => ['0']
            ];

            array_push($item_dropdown, $data);
        }

        return $item_dropdown;
    }
}
