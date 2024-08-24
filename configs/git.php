<?php
/** git configuration file */
return [
    'source_branch' => 'git-push-feature',
    'target_branch' => 'master',
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