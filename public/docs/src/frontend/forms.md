[Index](../index.html) / [Frontend](./index.html)

# Forms

We use a fancy library created by [David Ludwig]("https://github.com/SirDavidLudwig") to handle all of the form functionality. This library can fully automate Ajax forms and error reporting, as well as give you the ability to create dynamic form entries in cases where a variable number of entries is required.

## Table of Contents

- [Ajax Automation](#ajax-automation)
- [Dynamic Form Elements](#dynamic-form-elements)
- [Field Population](#field-population)

## Ajax Automation

The forms on the project should be using Ajax. To do this, we'll use the Ajax form utility which fully automates Ajax form submission, and error reporting.

Here is a simple example:
```html
@section("body")
    <form action="" method="post" name="my_form">
        ...
    </form>
@endsection
@section("script")
    <script>
        // Run when page is ready
        $(document).ready(function() {
            form.ajaxForm("my_form");
        });
    </script>
@endsection
```

Simply by executing the line `form.ajaxForm("my_form")`, the form is now completely setup for ajax submission, and error reporting. Isn't that magical?

### Ajax Form Utility

As you saw in the example above, ajax forms are created simply by calling `form.ajaxForm("[form_name]")`. Below is the complete documentation to the Ajax form utility

#### Declare Ajax Form

```js
form.ajaxForm(
    "[form_name]"
    [, onResult(form, fields, response) // Invoked when a form has been submitted and a response has beet retrieved
    [, onSubmit(formName) // Invoked just before a form has been submitted
    [, onErrors(form, fields, response) // Invoked if errors occurred after submission
]]]);
```

If you pass a function to the `onSubmit` parameter, and that functions returns `false`, submission will be canceled.

If you pass a function to the `onErrors` parameter, and that function returns `false`, normal error reporting will be canceled.

## Dynamic Form Elements

On some forms, they will require you to be able to have a variable amount of entries. This is where the dynamic form utility comes in.

To achieve this, we will define a single entry element under a templates section of the web page. We will then create a "dynamic area" to add those template entries to. Here is a working example:

```html
@section("body")
    <div class="container">
        @header("Email List")
        @dynamicarea("emails", "email-entry", "Email")
    </div>
@endsection
@section("dynamic_templates")
    <div data-dynamic-template-id="email-entry" class="row dynamic-form">
        <div class="form-group col-md-12">
            <label >Email</label>
            <div class="input-group mb-1">
                @text("email", ["data-feedback" => "email-feedback"])
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" data-dynamic-action="remove" type="button">Remove</button>
                </div>
            </div>
            <div data-feedback-area="email-feedback" class="invalid-feedback visible"></div>
        </div>
    </div>
@endsection
```

This will create an area with a button labeled "Add Email" which will insert one of the specified dynamic templates. You will notice inside the template, a button that has the attribute `data-dynamic-action="remove"`. This is attribute is responsible for this specific entry to be removed.

## Field Population

Sometimes you will like to populate the fields of a form. It can be that you saved, and would like to come back, or to autofill known information.

This system works by using a very specific JSON object configuration:
```js
var data = {
    // Static field names:
    "static": {
        `field_name`: `field_value`
        "my_field": "This value was autopopulated"
    },

    // Dynamic fields: This one is more complicated
    // since it's designed to work with dynamic entries
    "dynamic": {
        "dynamicarea-name": [
            {
                "template_field_name": "Value"
            }
        ]
    }
}
```

You can then invoke the form population function:

```js
form.dynamicFormPopulate(formName, data);
```

Congratulations, your form is now populated with data!
