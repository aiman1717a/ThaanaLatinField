# thaana-latin-field
This Nova Package allow you to use Nova field for thaana latin conversion
Please note that this package is still testing. The latin translation may not be perfect

## Installation
```
composer require aiman/thaana-latin-field
```

## Usage
In your Nova resource add the use declaration and use the Nova Latin Field
In order to use this field you must install [Thaana Text Field](https://github.com/aiman1717a/thaana-text-field)
```
use Aiman\ThaanaLatinField\ThaanaLatinField;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            ThaanaTextField::make('Content', 'content')->convertToLatin('latin_content'),
            ThaanaLatinField::make('Latin Content', 'latin_content'),
        ];
    }
```

## Important
This package is tested for **nova 2.0+**
Latest tested on **nova v3.6.0**

## Credit
Huge Credit goes for [@Jawish Hameed](https://github.com/jawish) for his thaana translation plugin [Thaana Keyboard](https://github.com/jawish/jtk)
