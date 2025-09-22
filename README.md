# Netty 🚀

> **Built to make working with [NettyFish](https://nettyfish.com/) easier, faster, and more Laravel-ish.**

Netty is a Laravel package crafted with ❤️ to simplify SMS & OTP workflows using NettyFish APIs.  
Instead of wiring up HTTP clients, manually handling payloads, and fighting with configs, Netty gives you:

- ⚡ A clean repository + contract-based structure
- 🏗️ Facade support for developer-friendly syntax
- 🛠️ A simple Artisan command to generate SMS templates
- 🔑 Full control with `.env` powered configuration
- 📦 A package-first approach for plug-and-play reusability

Perfect for OTP verification systems, transactional messages, and any NettyFish SMS workflows.

---

## 📦 Installation

Require the package via Composer:

```bash
composer require krish033/netty
```

Publish the config file:

```bash
php artisan vendor:publish --tag=config
```

Add your Nettyfish credentials to .env:

```
NETTYFISH_URL=
NETTYFISH_API_KEY=
NETTYFISH_SENDER_ID=
NETTYFISH_SENDER_CHANNEL=
NETTYFISH_SENDER_DCS=
NETTYFISH_FLASH_SMS=
NETTYFISH_SENDER_ROUTE=
NETTYFISH_PEID=
```

## ⚙️ Configuration

Once published, the config file (config/Netty.php) will allow you to control your NettyFish integration.
Each environment value maps directly to the API parameters, ensuring clean separation of concerns.

### Creating a Template

Generate a new SMS template using Artisan:

```bash
php artisan otpfy:make TemplateName
```

Add the DLT Template and the Approved message to the Template

```php

<?php

namespace App\Otpfy\Templates;

use Krish033\Otpfy\Contracts\Netty;

class LoginTemplate implements Netty
{


    /**
    * DLT Template ID, get the approved DLT Message Template
    */
    public function template(): string
    {
        return ''; // add template id
    }




    /**
    * The message body, which should be approved by DLT
    */
    public function message(): string
    {
        return "say hii to {{ nettyfish }}"; // add template approved message
    }
}

```

Bring in the Data you want to send via message

```php

// app/Otpfy/Templates/TemplateName
public function __construct(public array $data)
{
    //
}
```

## 📝 Usage

Send an SMS in one line:

```php
use App\Otpfy\Templates\YourTemplate;
use Krish033\Otpfy\Facades\Message;

/**
* Send message
*/
Message::send(YourTemplate::class)->to("987654XXXX");

```
