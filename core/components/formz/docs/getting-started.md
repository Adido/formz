<style>
.figure { padding: 10px 0 15px }
.figure img { padding: 0 0 5px; height: auto; max-width: 100% }
</style>
## Quickstart Guide
Here I will walk you through creating your first Formz form:

1. Go to the extras menu in MODX and select `Formz Builder`.<div class="figure" id="figure-2-1">![Extras Menu](images/ch2_quickstart_step1.png)<br/>**Figure 1** Component Menu</div>
2. Click on `Create a new Form`, once the interface is ready we can start by entering the required fields. The `Name` field is required and so is the `Success Message`, all the other fields can remain default.<div class="figure" id="figure-2-2">![Create a new Form](images/ch2_quickstart_step2.png)<br/>**Figure 2** Create a new Form</div>
3. Enter *"Contact"* in the `Name` field and *"Thank you for contacting us"* in the `Success Message` field.<div class="figure" id="figure-2-3">![Form Required Fields](images/ch2_quickstart_step3.png)<br/>**Figure 3** Form Required Fields</div>
4. Click on `Save` and the browser should reload and you will now be in edit mode.
5. Click on `Fields` tab and this is where you enter the fields you want available to your form.<div class="figure" id="figure-2-5">![Fields Tab](images/ch2_quickstart_step5.png)<br/>**Figure 5** Fields Tab</div>
6. Above the Grid you will see `Add Field` action at the top right. Click on this button and a form window will open.
7. The `Label` field is the only required field on this form, we will enter *"Name"* for our Label.<div class="figure" id="figure-2-7">![Field Window](images/ch2_quickstart_step7.png)<br/>**Figure 7** Field Window
8. Now click on the `Properties` tab and check the `required` checkbox. This will make sure that the user has to enter a name in order to submit the web form.<div class="figure" id="figure-2-8">![Properties Tab](images/ch2_quickstart_step8.png)<br/>**Figure 8** Properties Tab
9. Repeat step 7 but this time lets enter in the `Label` field *"Email"* and on the `Properties` tab lets check the `required` checkbox and select from the `Validation` field *"Email"*.<div class="figure" id="figure-2-9">![Validation Field](images/ch2_quickstart_step9.png)<br/>**Figure 9** Validation Field
10. Repeat step 7 but this time lets enter in the `Label` field *"Message"*, then change the `Type` field to *"Textarea"* and on the `Properties` tab check the `required` checkbox<div class="figure" id="figure-2-10">![Type Field](images/ch2_quickstart_step10.png)<br/>**Figure 10** Type Field
11. Lets create our Template Variable to display our Form on the website, lets enter in the `Name` field *"form"* and in the `Caption` field *"Form"*.<div class="figure" id="figure-2-11">![Template Variable](images/ch2_quickstart_step11.png)<br/>**Figure 11** Template Variable
12. Click the `Input Options` tab and set the `Input Type` field to *"Formz"*.<div class="figure" id="figure-2-12">![Input Options](images/ch2_quickstart_step12.png)<br/>**Figure 12** Input Options
13. Click the `Output Options` tab and set the `Output Type` field to *"Formz"*.<div class="figure" id="figure-2-13">![Output Options](images/ch2_quickstart_step13.png)<br/>**Figure 13** Output Options
14. Click the `Template Access` tab and set which template you want to have access to your Template Variable.<div class="figure" id="figure-2-14">![Template Variable Tab](images/ch2_quickstart_step14.png)<br/>**Figure 14** Template Variable Tab
15. Place you newly created Template Variable `[[*form]]` inside your template or in the content area of the page you will create. I will do the latter for this guide.<div class="figure" id="figure-2-15">![Page Content](images/ch2_quickstart_step15.png)<br/>**Figure 15** Page Content
16. Click the `Template Variables` tab and select your *"Contact"* from the `Form` field.<div class="figure" id="figure-2-16">![Template Variables Tab](images/ch2_quickstart_step16.png)<br/>**Figure 16** Template Variables Tab

Congratulations you have created your first web form with Formz, now go and create more and explore the features.
