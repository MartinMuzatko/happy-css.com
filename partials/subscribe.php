<?php namespace ProcessWire;
$groupsApi = (new \MailerLiteApi\MailerLite($config->mailerLiteApiKey))->groups();

$subscriber = [
    'email' => $sanitizer->email($input->post->email),
    'fields' => [
        'name' => $input->post->name
    ]
];

if (!strlen($input->post->honeypot) && strpos($input->post->name, '59') !== 0) {
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
                            Yikes - there is a problem with your signup.
                        </h1>
                        <p class="description">Your name matches a common spambot name. Please omit any numbers from your name. </p>
                    </div>
                </div>
            </header>
        </main>
    <?php
    $content = ob_get_clean();
}
