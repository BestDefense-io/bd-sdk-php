# BestDefense.io - PHP SDK Package

Welcome to the **PHP SDK Package**! This SDK allows you to easily interact with **BestDefense.io Service API** within your Laravel or Symfony applications. It provides seamless integration and autowiring, requiring minimal setup so you can focus on building your application.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
    - [Laravel](#laravel)
    - [Symfony](#symfony)
- [Usage](#usage)
    - [Laravel Example](#laravel-example)
    - [Symfony Example](#symfony-example)
- [Methods](#methods)
- [Contributing](#contributing)
- [License](#license)

---

## Installation

You can install the package via Composer. It's hosted on [Packagist](https://packagist.org/packages/bestdefense-io/bd-sdk-php) and can be included in your project by running:

```bash
composer require bestdefense-io/bd-sdk-php
```

---

## Configuration

### Laravel

1. **Publish the Configuration File**

   After installing the package, publish the configuration file using Artisan:

   ```bash
   php artisan vendor:publish --provider="BestdefenseIo\BdSdkPhp\Providers\ApiServiceProvider" --tag="config"
   ```

   This command will publish a `bestdefense_sdk.php` configuration file to your application's `config` directory.

2. **Set Environment Variables**

   Add your API credentials to your `.env` file:

   ```env
   BESTDEFENSE_API_TOKEN=your-api-token
   BESTDEFENSE_ACCOUNT_ID=your-account-id
   ```

   Alternatively, you can set these values directly in the `config/bestdefense_sdk.php` file.

3. **Caching Configuration (Optional)**

   If you cache your configuration, remember to refresh it after making changes:

   ```bash
   php artisan config:cache
   ```

### Symfony

1. **Register the Bundle**

   Add the bundle to your `config/bundles.php` file:

   ```php
   return [
       // ...
       BestdefenseIo\BdSdkPhp\BdSDKBundle::class => ['all' => true],
   ];
   ```

2. **Configure Environment Variables**

   Add your API credentials to your `.env` file:

   ```env
   BESTDEFENSE_API_TOKEN=your-api-token
   BESTDEFENSE_ACCOUNT_ID=your-account-id
   ```

3. **Import Services Configuration**

   Ensure that the package's services configuration is loaded by importing it in your `config/services.yaml`:

   ```yaml
   # config/services.yaml
   imports:
       - { resource: '@BdSDKBundle/Resources/config/services.yaml' }
   ```

---

## Usage

Once installed and configured, you can start using the SDK in your application.

### Laravel Example

```php
<?php

namespace App\Http\Controllers;

use BestdefenseIo\BdSdkPhp\ApiService;

class YourController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $reports = $this->apiService->getRunningReports();

        // Process the data as needed
        return view('your_view', compact('reports'));
    }
}
```

### Symfony Example

```php
<?php

namespace App\Controller;

use BestdefenseIo\BdSdkPhp\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class YourController extends AbstractController
{
    public function index(ApiService $apiService): Response
    {
        $reports = $apiService->getRunningReports();

        // Process the data as needed
        return $this->render('your_view.html.twig', [
            'reports' => $reports,
        ]);
    }
}
```

---

## Methods

Below are some of the methods available in the `ApiService` class. Replace these with actual methods provided by your SDK.

- `getData()`: Retrieves data associated with your account.
- `createResource(array $parameters)`: Creates a new resource.
- `updateResource(string $id, array $parameters)`: Updates an existing resource.
- `deleteResource(string $id)`: Deletes a resource.

**Example Usage:**

```php
// Retrieve data
$data = $yourService->getData();

// Create a new resource
$newResource = $yourService->createResource([
    'name' => 'honeypot',
    'type' => 'medium', #small, medium, large
    'region' => 'us-east-2',
    'meta' => [
        'term' => '1 year',
        'config' => [ ... ]
    ],   
]);

// Update a resource
$updatedResource = $yourService->updateResource('resource-id', [
    'name' => 'Some New Updated Name',
]);

// Delete a resource
$yourService->deleteResource('resource-id');
```

---

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository on GitHub.
2. Create a new branch for your feature or bugfix.
3. Write tests for your changes.
4. Submit a pull request with a clear description of your changes.

Please make sure all tests pass before submitting your pull request.

---

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

If you encounter any issues or have questions, feel free to open an issue on [GitHub](https://github.com/bestdefense-io/bd-sdk-php/issues).

Happy coding! 🚀
```