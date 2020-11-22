[Index](../index.html) / [Frondend](./index.html)

# Tables

We use a custom table component written specifically for this project. Not only is it able to display data, it also supports keyword filtering, and date range filtering. Anytime you need a table, this widget will do pretty much everything for you

## Features
- Clickable Rows
    - Enable/Disable (default: disabled)
- Filter Data
    - Keywords
    - Date Range
- Pagination
    - Enable/Disable
    - Rows Per Page

## Usage

The basic usage for the table is like so

```php
@table($options)
```

There are a couple required options that you will need to give it: `name`, and `columns`.

```php
@table([
    "name"    => "my_table",
    "columns" => [
        "first_name",
        "last_name",
        "email"
    ]
])
```

You will notice that, when you view this table, the columns will display:
```
my_table.first_name | my_table.last_name | my_table.email
```

To fix this, you will need to give your columns a nice, readable name in the `tables.php` locale file located in `resources/lang/en/tables.php`

```php
"my_table" => [
    "first_name" => "First Name",
    "last_name"  => "Last Name",
    "email"      => "Email"
]
```

And magically, your table names will now render as:

```
First Name | Last Name | Email
```

### Options

In order for this table to be usable, we'll need to set some options

#### Columns and Data

The names that are passed in the `columns` option are the keys to the JSON data that you give to the table to display. Example below:

```php
@table([
    "name"    => "my_table",
    "columns" => ["name", "email"],
    "data"    => [
        [
            "id"    => 17,
            "name"  => "John Smith",
            "email" => "email@example.com"
        ],
        [
            "id"    => 97,
            "name"  => "Chris Hanson",
            "email" => "chris@hanson.com"
        ]
    ]
])
```

Because you specified that you want `name`, and `email` from the given data, only those fields of information will be displayed. The `id` field will still be in the data, but it won't be displayed.

You can also change the data dynamically using Javascript

```js
    table("table_name").setData(dataObject);
```

#### Clickable Rows

By default, the rows are not clickable. You can make them clickable by setting the `clickable` option to `true`

```php
@table([
    ...
    "clickable" => true
])
```

You can now respond to these click events on the frontend. For example:

```html
@section("script)
    <script>
        table("table_name").click(function(rowData) {
            // This will print the data for the given row
            console.log(rowData);
        })
    </script>
@endsection
```

#### Pagination

By default, pagination is enabled, displaying 15 rows per page. You can change the number of rows per page, set the current page, or disable pagination completely.

```php
@table([
    "pagination" => true,
    "perPage"    => 15,
    "page"       => 0 // Page is 0 indexed
])
```

You can also change the current page using Javascript:

```js
table("my_table").setPage(0);
```

#### Filter Data

You can filter the data that gets displayed in the table.

##### Filter by Keywords

First, specify the columns that you want to search for the given keywords: `"keywordIndices" => [...data column names]`

Here is an example making use of this:

```html
@section("body")
    @table([
        ...
        "keywordIndices" => ["name", "email"]
    ])
@endsection
@section("script")
    <script>
        $(document).ready(function() {
            table("table_name").setKeywordFilter("John Smith email@example.com");
        });
    </script>
@endsection
```

##### Filter by Date

To allow filtering by date, you need to tell the table which column stores the date. To do this, you will set the option `"dateIndex" => "column_name"`

Now to apply a date filter...

```html
@section("body")
    @table([
        ...
        "dateIndex" => ["date"]
    ])
@endsection
@section("script")
    <script>
        $(document).ready(function() {
            var startDate = "1988-01-01"; // Y-m-d
            var endDate = "2018-01-01"; // Y-m-d
            table("table_name").setDateFilter(startDate, endDate);
        });
    </script>
@endsection
```
