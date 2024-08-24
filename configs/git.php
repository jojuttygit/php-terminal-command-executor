<?php
/** git configuration file */
return [
    'source_branch' => 'feature-branch',
    'target_branch' => 'master-branch',
    'commit_message' => 'File migration inital commit',

    'migration_files' => [
        'resources/views/test_folder/test.blade.php',
        'public/images/test.png'
    ],

    /** Restrict the source branch */
    'restricted_branches' => [
        'production',
        'prod',
        'newdemo',
        'demo'
    ],
];