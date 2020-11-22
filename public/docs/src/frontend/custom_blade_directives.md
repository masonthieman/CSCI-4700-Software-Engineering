[Index](../index.html) / [Frontend](./index.html)

# Custom Blade Directives

To make the workflow easier, we created our own Blade directives that we used throughout the frontend.

The source code to these Blade directives is located in various service providers inside the `app/Providers` directory. See Laravel's [Service Provider documentation](https://laravel.com/docs/5.6/providers) for more information!

## Table of Contents

- [General Directives](#general-directives)
- [Forms](#forms)
- [Tabs](./tabs.html)
- [Table](./table.html)

## General Directives

### Service Provider

These general service providers are simply located in the `AppServiceProvider`.

#### Import CSS file:

```html
@css("[filename]") <!--No need for file extension-->

{{-- yields --}}
<link type="text/css" rel="stylesheet" href="css/[filename].css">
```

#### Import JS file:

```html
@js("[filename]") <!--No need for file extension-->

{{-- yields --}}
<script src="js/[filename].js"></script>
```

#### Container Divider:

```html
@divider

{{-- yields --}}
<div class="row">
    <div class="col-12">
        <hr>
    </div>
</div>
```

#### Section Title:

```html
@header("[title]")

{{-- yields --}}
<div class="row">
    <div class="col-12 text-center">
        <h3>[title]</h3>
    </div>
</div>
```

## Form Directives

Forms are where our Blade directives really shine. These directives are designed for Ajax forms. If you are going to be making a standard form, it's really best to code them normally. These directives will create the HTML elements for the fields themselves, as well as create the markup for error reporting. If you ever make a new form, you can simply reuse these Blade directives and everything will automatically work!

### Service Provider
These form directives are given by the `FormServiceProvider` provider.

### Customizing attributes
You'll notice that on every one of the Blade form directives, there is an `$attributes` parameter. If you want to add an attribute to your input element, such as `id`, or add some extra classes with `class`, You can use the `$attributes` parameter. For example:
```blade
@text("username", ["id" => "uname", "class" => "custom-class", "placeholder" => "Enter Username..."])

{{-- gives you... --}}
<input type="text" name="username" value="" class="form-control custom-class" id="uname" placeholder="Enter Username...">
<div class="invalid-feedback"></div>
```

### Customize Error Reporting

By default, all input directives will generate a location to display invalid feedback immediately after the input itself. In some cases (especially for input groups), you will not want this behavior. So instead, you may use something like the following (this works for all input directives):

```html
<div class="input-group">
    @text("search", ["data-feedback" => "search-feedback"])
    <div class="input-group-append">
        <button>Submit</button>
    </div>
    <div class="invalid-feedback visible" data-feedback-area="search-feedback"></div>
</div>
```

**TODO** As an assignment, you should turn that "invalid feedback div" into a custom Blade directive: `@feedback($names)`. This Blade directive does not yet exist, but it would be great for you to do to get familiar with Blade directives.

### Text Input

Each of the following Blade directives will esentially produce the following output
```html
<input type="<type>" name="<name>" value="<value>" class="form-control">
<div class="invalid-feedback"></div>
```

#### Customizable Input Type

```blade
@input(string $type, string $name [, array $attributes [, string $value]])
```

#### Date Input

```blade
@date(string $name [, array $attributes [, string $value]])
```

#### Email input

```blade
@email(string $name [, array $attributes [, string $value]])
```

#### Number Input

```blade
@number(string $name [, array $attributes [, string $value]])
```

#### Password input

```blade
@password(string $name [, array $attributes [, string $value]])
```

#### Phone number input

```blade
@phone(string $name [, array $attributes [, string $value]])
```

#### Text input

```blade
@text(string $name [, array $attributes [, string $value]])
```

### Select Boxes
There are a couple of types of select boxes that we have available. We have a normal select box, and
a select box that will allow you to specify some 'other' option by filling in a text box. We also have
some pre-coded select boxes for other things, like state selection, ethnicity selection, etc. These will
produce the following markup
```html
<select name="<name>" class="custom-select">
    <option value="">Select [label]</option>
    <option value="<options.key>">[options.value]</option>
    ...
</select>
<div class="invalid-feedback"></div>
```

#### Generic Select

```blade
@select(string $label, string $name, array $options [, array $attributes [, string $selected]])
```

#### Select U.S. State

```blade
@selectstate(string $name, [, array $attributes [, string $selected]])
```

#### Select Medical Abbreviation

```blade
@selectmedabbrev(string $name, [, array $attributes [, string $selected]])
```

#### Searchable Select

```blade
@selectsearch(string $label, string $name, array $options [, array $attributes [, string $selected]])
```

#### Select Patient

```blade
@selectpatient(string $name [, array $attributes [, string $selected]])
```

#### Select Practice

```blade
@selectpractice(string $name [, array $attributes [, string $selected]])
```

#### Select Other

```blade
{{-- Select Box --}}
@selectorother(string $label, string $name, array $options [, array $attributes [, string $selected]])
```

#### Select Ethnicity

```blade
@selectethnicity(string $name [, array $attributes [, string $selected]])

@other(string $name)
```
