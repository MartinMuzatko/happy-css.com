<?php namespace ProcessWire;
$groupsApi = (new \MailerLiteApi\MailerLite($config->mailerLiteApiKey))->groups();

$subscriber = [
    'email' => $sanitizer->email($input->post->email),
    'fields' => [
        'name' => $input->post->name,
        'last_name' => $input->post->lastname,
    ]
];

if (!strlen($input->post->lastname)) {
    $response = $groupsApi->addSubscriber((int) $input->post->groupid, $subscriber);
} else {
    ob_start();
    include('partials/header.php');
    ?>
        <main class="site__content">
            <header
                class="stripe stripe--dark">
                <div>
                    <div class="title">
                        <h1>
                            I can't sign you up.
                        </h1>
                        <p class="description">You are not supposed to fill in the lastname field in the signup form - it is a honeypot for bots. Please try again</p>
                    </div>
                </div>
            </header>
        </main>
    <?php
    $content = ob_get_clean();
}
