[Index](../index.html) / [Frondend](./index.html)

# Tabs

In some cases, it is handy to divide the page up into separate tabs. This little utility will help you do this with ease.

## Usage

There is no current Blade directive for this, so you will just include it like any other component.

```php
@component("component.tabs", [
    "name" => "my_tabs",
    "tabs" => ["tab_1", "tab_2"]
    ])
    @slot("tab_1")
        ...Tab 1 Content
    @endslot
    @slot("tab_2")
        ...Tab 2 content
    @endslot
@endcomponent
```

In the `tabs` option, you will pass in the `tab id` for each tab. You will then use the `@slot("[tab_id]")...@endslot` to define the content of that tab.

To give your tabs a nice, pretty label, head over to the `tabs.php` locale file located in `resources/lang/en/tabs.php`. Example:

```php
"my_tabs" => [
    "tab_1" => "Tab 1",
    "tab_2" => "Tab 2"
]
```
