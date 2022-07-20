
// users original array
const users_arr = [{
    id: 1,
    title: "ahmed magdi",
    user_type: "Guards",
    status: "active",
    image: "images/user-avatar.jpg",
    company: "none",
},
{
    id: 2,
    title: "Mohammed Omer",
    user_type: "Guards",
    status: "active",
    image: "images/1.png",
    company: "none",
},
{
    id: 3,
    title: "Kamal Ali",
    user_type: "Guards",
    status: "active",
    image: "images/2.png",
    company: "none",
},
{
    id: 4,
    title: "Rodwan samih",
    user_type: "admin",
    status: "active",
    image: "images/3.png",
    company: "none",
},
{
    id: 5,
    title: "Mahmoud khalil",
    user_type: "admin",
    status: "active",
    image: "images/4.png",
    company: "none",
},
{
    id: 6,
    title: "baraa eisa",
    user_type: "customer",
    status: "inactive",
    image: "images/user-avatar.jpg",
    company: "twitter",
},
{
    id: 7,
    title: "sami massik",
    user_type: "customer",
    status: "active",
    image: "images/4.png",
    company: "twitter",
},
{
    id: 8,
    title: "rwda gadir",
    user_type: "dispatcher",
    status: "inactive",
    image: "images/3.png",
    company: "none",
},
{
    id: 9,
    title: "Mahmoud mohammed",
    user_type: "customer",
    status: "active",
    image: "images/2.png",
    company: "twitter",
},
{
    id: 10,
    title: "ahmed farah",
    user_type: "customer",
    status: "active",
    image: "images/2.png",
    company: "twitter",
},
{
    id: 11,
    title: "Kamal Ali",
    user_type: "customer",
    status: "active",
    image: "images/user-avatar.jpg",
    company: "facebook",
},
{
    id: 12,
    title: "Omer alghali",
    user_type: "customer",
    status: "active",
    image: "images/1.png",
    company: "facebook",
},
{
    id: 13,
    title: "magdi azez",
    user_type: "customer",
    status: "active",
    image: "images/2.png",
    company: "youtube",
},
{
    id: 14,
    title: "gadir ali",
    user_type: "customer",
    status: "inactive",
    image: "images/3.png",
    company: "youtube",
},
];


// empty array to store filtred array
var filtred_array = [];

// starting with push all array to the table
this.push_to_table(users_arr);

// keyup event when user input characters on user_name field
$("input[name='user_name']").keyup(function () {
    var user_name = this.value;
    filterByName(user_name);
});

//store checked boxes in array , dispatch when user checked
$("input[name='user_type']").change(function () {
    var userTypesSelected = [];
    $("input[name='user_type']:checked").each(function () {
        userTypesSelected.push($(this).val());
    });
    filterByUserType(userTypesSelected);
});

// management company
$("select[name='company_management']").change(function () {
    var select_val = this.value;

    if (select_val === "") {
        $("input:checkbox[name=user_type]").each(function () {
            $(this).prop('checked', false);
        });
        filtred_array.length = 0
        push_to_table(users_arr);
    } else {
        filterByCompany(select_val);
    }
});


// set selected user in user input
function set_selected(param) {
    $("input[name='user_name']").val(param);
}

// reset user input
function reset_user_input() {
    $("input[name='user_name']").val(" ");
}

// filter methods ...... start

// 1- first method {filter by first / last / username}
// - first check if filtred array is empty
// - if filtred array empty , will filter in original array {users_arr}
// - else will fillter in filtred array

const filterByName = (query) => {
    if (filtred_array.length > 0) {
        var filtred_arr = filtred_array.filter(el => el.title.toLowerCase().indexOf(query.toLowerCase()) !== -
            1);
    } else {
        var filtred_arr = users_arr.filter(el => el.title.toLowerCase().indexOf(query.toLowerCase()) !== -1);
    }

    return push_to_table(filtred_arr);;
}


// 2- second method {filter by user type / guards / dispatcher ...}
// - first make filtred array empty !!;
// - then filter the original array {users_arr}
// - foreach to push element from {users_arr} to filtred array
// - if any of checkbox not checked , it will return original array (users_arr)
// - if checked any box will return filtred array

const filterByUserType = (userTypesSelected) => {
    filtred_array.length = 0
    var getUserTypes = users_arr.filter(function (users) {
        return userTypesSelected.indexOf(users.user_type) > -1 || userTypesSelected.indexOf(users
            .status) > -1;
    });
    getUserTypes.forEach(push_to_array);

    function push_to_array(item) {
        filtred_array.push(item);
    }

    if (filtred_array.length === 0) {
        this.push_to_table(users_arr);
    } else {
        this.push_to_table(filtred_array);
    }

    return filtred_array;
}


// 3- third method {filter by company / facebook / twitter ...}

// - first make filtred array empty !!.
// - then filter the original array {users_arr}.
// - foreach to push element from {users_arr} to filtred array.
// - get all checkbox values.
// - first : pick the checkbox has customer value and checked.
// - second : unchecked other checkbox.

const filterByCompany = (query) => {
    filtred_array.length = 0;
    var filtred_arr = users_arr.filter(el => el.company.toLowerCase().indexOf(query.toLowerCase()) !== -1);
    filtred_arr.forEach(push_to_array);

    function push_to_array(item) {
        filtred_array.push(item);
    }
    $("input:checkbox[name=user_type]").each(function () {
        if ($(this).val() === "customer") {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
    });
    return push_to_table(filtred_array);
}


// 4- forth method {push data to table}

// - this method responsible from push data to users table.
// - first make {tbody} in table empty.
// - second get array , and push to the table by foreach.
// - insertRow to add new {tr} html tag.
// - insertCell to add new {td} html tag.
// - innerHTML to html element between {td} element.

function push_to_table(arr) {
    $("#testBody").html("");
    const table = document.getElementById("testBody");

    arr.forEach(users => {
        let row = table.insertRow();

        let id = row.insertCell(0);
        id.innerHTML = users.id;

        var image_tag = "<img src=" + users.image + " class='user-avatar'>";
        let image = row.insertCell(1);
        image.innerHTML = image_tag;

        let title = row.insertCell(2);
        title.innerHTML = users.title;

        let user_type = row.insertCell(3);
        user_type.innerHTML = users.user_type;

        let status = row.insertCell(4);
        status.innerHTML = users.status;

        let company = row.insertCell(5);
        company.innerHTML = users.company;

        var action_btn =
            "<button class='btn btn-success btn-sm user_name_btn' data-dismiss='modal'  aria-label='Close'  onclick=\'set_selected(\"" +
            users.title +
            "\")\'   ><i class='fa fa-check'></i></button>";
        let action = row.insertCell(6);
        action.innerHTML = action_btn;
    });
}
