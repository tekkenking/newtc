<?php

return [
    tc_str()    => [
        'mainmenu'  =>  [
            [
                'name'  =>  'Dashboard',
                'icon'  =>  'fa fa-desktop',
                'link'  =>  'tc.dashboard'
            ],

            [
                'name'  =>  'Manage staff',
                'icon'  =>  'fa fa-user-circle-o',
                'link'  =>  'tc.staff.index'
            ],

            [
                'name'  =>  'Access Control Level',
                'icon'  =>  'fa fa-cubes',
                'link'  =>  'tc.acl.role.index'
            ],

            [
                'name'  =>  'Manage Agencies',
                'icon'  =>  'fa fa-building-o',
                'link'  =>  'tc.agency.index'
            ],

            [
                'name'  =>  'Manager QrCode',
                'icon'  =>  'fa fa-qrcode',
                'link'  =>  'tc.barcode.index'
            ]
        ]
    ],

    agency_str() => [
        'mainmenu'  =>  [
            [
                'name'  =>  'Dashboard',
                'icon'  =>  'demo-pli-home',
                'link'  =>  'agency.dashboard.index'
            ],

            [
                'name'  =>  'Staff Management',
                'icon'  =>  'demo-pli-split-vertical-2',
                'link'  =>  'agency.staff.list'
            ],

            [
                'name'  =>  'Bill Management',
                'icon'  =>  'demo-pli-gear',
                'link'  =>  'agency.bill.list'
            ],

            [
                'name'  =>  'Customers',
                'icon'  =>  'demo-pli-boot-2',
                'link'  =>  'agency.customers.list'
            ],

            [
                'name'  =>  'Logout',
                'icon'  =>  'demo-pli-boot-2',
                'link'  =>  'get.logout.action'
            ],

        ]
    ],

    customer_str() => [
        'mainmenu'  =>  [
            [
                'name'  =>  'Dashboard',
                'icon'  =>  'demo-pli-home',
                'link'  =>  'customer.dashboard'
            ],

            [
                'name'  =>  'Profile',
                'icon'  =>  'demo-pli-split-vertical-2',
                'link'  =>  'customer.profile.show'
            ],

            [
                'name'  =>  'Agency',
                'icon'  =>  'demo-pli-gear',
                'link'  =>  'customer.agency.show',
                'badge' =>  true
            ],

            [
                'name'  =>  'Reports',
                'icon'  =>  'demo-pli-gear',
                'link'  =>  'customer.report.tabs'
            ],

            [
                'name'  =>  'Logout',
                'icon'  =>  'demo-pli-unlock icon-lg icon-fw',
                'link'  =>  'get.logout.action'
            ],
        ]
    ]
];