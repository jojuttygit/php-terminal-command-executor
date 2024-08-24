<?php
/** git configuration file */
return [
    'source_branch' => 'dev2-tmp',
    'target_branch' => 'dev2-release-sprint',
    'commit_message' => 'File migration inital commit',

    'migration_files' => [
        'resources/views/emails/e-sign.blade.php',
        'public/images/background_sign.png'
    ],

    /** Restrict the source branch */
    'restricted_branches' => [
        'production',
        'prod',
        'newdemo',
        'demo'
    ],
];