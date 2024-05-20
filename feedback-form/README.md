## What I've Learned: 

- I learned how to create a custom Form Request. This is a specialized extension of the base `Request`class. It is beneficial because I will have a `Cleaner Controllers` and it's `Reasuable`. In addition, it is useful because it allows me to add a custom logic specific to that form such as:
    
1. **Data Preparation**
    > I can prepare (*modify* or *sanitize*) the data before it is validated. (e.g., trimming whitespace, converting to lowercase).
2. **Validation**
    > I can add custom validation rules that are specific to that form.
3. **Authorization**
    > I can add custom authorization logic that is specific to that form.>
#

- I discovered hot to display the form errors. I can use the `@error` directive to display the error message for a given field. This directive is useful because it allows me to display the error message for a given field.
- I learned how to create and display a flash data using the `flash` method. The syntax is: 
    ```
    $request->session()->flash('status', 'Task was successful!');
    session('status') //To get the flash data
    ```
