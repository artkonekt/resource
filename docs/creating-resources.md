# Creating Resources

Let's first take a high-level look at how resources are used. A resource class represents a single
model/entity from you application that needs to be transformed into a structure of your API
(most often JSON).

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

---

**Next**: [Pagination &raquo;](pagination.md)
