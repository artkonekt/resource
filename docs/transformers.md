# Transformers

Whenever a resource converts the source model to an array, the source's attributes are retrieved by
a transformer object. The library ships with a default transformer that fetches attributes according
to the following logic when accessing `$this->attribute('attribute_name')`:

- `$source['attribute_name']` if the source model is an array,
- `$source->toArray()['attribute_name']` if the source model has a `toArray()` method,
- `$source->__toArray()['attribute_name']` if the source model has a `__toArray()` method,
- `$source->getAttributeName()` if the source model has such a method,
- `$source->attributeName` if the source has such a property (won't work via magic getter),
- `$source->attribute_name` property (also works via magic getter)

If this generic logic doesn't work with your type of source model then you can customize the
transformer.

## Customizing the Transformer

To use a custom transformer within your Resource class, set the transformer class in the
`$transformer` property:

```php
class ShipmentTransformer extends Resource
{
    protected static $transformer = YourCustomTransformer::class;
}
```

This will cause the resource to use the custom transformer to access the source model's properties.

The transformer must implement the `SourceTransformer` interface which consists of 2 methods:

```php
use Konekt\Resource\Contracts\SourceTransformer;

class YourCustomTransformer implements SourceTransformer
{
    public function toArray($source) : array
    {
        return (array) $source;
    }

    public function attribute(string $name, $source)
    {
        return $source->someCustomLogicToAccessAnAttribute($name);
    }
}
```

The `toArray()` method is used as a 'default' all-in one getter. It is used in case you don't
explicitly set the fields in the toArray method of a concrete resource class.

The `attribute()` method is used to retrieve a single field/property/attribute identified by `$name`.

Both methods receive the source model as the `$source` argument.

---

**Next**: [Pagination &raquo;](pagination.md)
