# Defining Resources

Let's first take a high-level look at how resources are used. A resource class represents a single
model/entity from your application that needs to be transformed into a structure of your API
(most often JSON).

## Source Models (Entities)

Source models are defined by your application which can be for example:

- Doctrine entities,
- Active record instances (eg. Phalcon ORM models),
- Enums,
- Simple arrays, 🤪
- any other object which you want to expose via API.

## Basic Usage

If you want to convert your source model to an API resource you have to create a new resource object
by passing the source model to the constructor:

```php
// The source model:
$product = $productRepository->find(1);

// The resource:
$resource = new ProductResource($product);

// The HTTP response:
$response = new JsonResponse($resource->resolve());
```

## Creating Resources

For example, here is a simple User resource class:

```php
namespace App\ApiResources;

use Konekt\Resource\Resource;

class User extends Resource
{
    public function toArray(): array
    {
        return [
            'id' => $this->attribute('id'),
            'name' => $this->attribute('name'),
            'email' => $this->attribute('email'),
            'created_at' => $this->attribute('created_at'),
            'updated_at' => $this->attribute('updated_at')
        ];
    }
}
```

!> Do not use the `toArray()` method when returning HTTP responses, use the `resolve()` method instead.

Every resource class defines a `toArray` method which returns the array of attributes that should be
returned with the HTTP response. Source model properties can be accessed via
`$this->attribute('fieldname')` method. This call will fetch the property from the source model via:

- `$source['field_name']` if the source model is an array,
- `$source->toArray()['field_name']` if the source model has a `toArray()` method,
- `$source->__toArray()['field_name']` if the source model has a `__toArray()` method,
- `$source->fieldName()` if the fieldName is an "is"-er (starts with 'is', 'has', 'can', 'was', 'should', 'allows') and source has such a method,
- `$source->getFieldName()` if the source model has such a method,
- `$source->fieldName` if the source has such a property (won't work via magic getter),
- `$source->field_name` property (also works via magic getter)

> The behavior above is defined by the default built-in transformer that ships with this library.
> See the [Transformers](transformers.md) section for details about customization.

## Using Resources

Once the resource is defined, it may be returned from a route or controller:

```php
class ProductController
{
    public function getAction($request)
    {
        $product = new ProductResource(Product::find($request->get('id')));

        return new JsonResponse($product->resolve());
    }
}
```

---

**Next**: [Transformers &raquo;](transformers.md)
