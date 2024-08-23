<?php

return [
    'source_branch' => 'dev2-tmp',
    'target_branch' => 'dev2-release-sprint',
    'commit_message' => 'File migration Jira 3491',

    'migration_files' => [
        'resources/views/emails/e-sign.blade.php',
        'public/images/background_sign.png'
    ],

    'restricted_branches' => [
        'production',
        'prod',
        'newdemo',
        'demo'
    ],
];