#User age in hours#
This is a simple demonstration application that will allow a user to enter their name and date of birth and then display the number of days and hours the person has been alive.

##Use cases##
1. As a user, I should be able to enter my full name.
2. As a user, I should be able enter my date of birth using a date-picker. The date should be in the format DD/MM/YYYY
3. As a user, after entering my name and date of birth, I should be able to see how many days and hours I have been alive.
4. As a user, I should be able to view the names and ages (days/hours) of all other users that have used the application.

###Assumptions###
1. A user should be able to type their date of birth as well as use a date picker.
2. When displaying the length of time that the user has been alive, leap years should be incorporated.
3. When viewing other users' information, no pagination is required.
4. Previous user information will persist as long as the storage mechanism is not truncated.