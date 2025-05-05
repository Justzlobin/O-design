<?php

return [
    'validation' => [
        'name_required' => 'Name is required.',
        'name_string' => 'Name must be a valid string.',
        'name_max' => 'Name can\'t exceed 255 characters.',

        'phone_required' => 'Phone number is required.',
        'phone_format' => 'Please enter a valid Ukrainian phone number in the format +380(XX) XXX-XX-XX.',

        'email_format' => 'Please provide a valid email address.',
        'email_max' => 'Email can\'t exceed 255 characters.',

        'comment_max' => 'Comment can\'t exceed 1000 characters.',
    ],
    'form' => [
        'title' => 'Contact with me',
        'name_placeholder' => 'Name',
        'phone_placeholder' => 'Tel: 0969998877',
        'email_placeholder' => 'E-mail',
        'comment_placeholder' => 'Comment',
        'btn' => 'Send'
    ],
];
