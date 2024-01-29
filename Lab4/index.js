function view(link) {
    console.log(link);
    let id = link.parentNode.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    console.log(id);
    window.location.replace(`./userView.php?userId=${id}`);

}

function del(link) {
    console.log(link);
    let removedRow = link.parentNode.parentNode;
    let id = link.parentNode.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    removedRow.remove();
    console.log(id);
    window.location.replace(`./delete.php?userId=${id}`);
}

function updateUser(link) {
    console.log(link);
    let removedRow = link.parentNode.parentNode;
    let username = link.parentNode.previousSibling.previousSibling.previousSibling.
    previousSibling.previousSibling.previousSibling.innerHTML;

    let email = link.parentNode.previousSibling.previousSibling.previousSibling.
    previousSibling.previousSibling.innerHTML;

    let gender = link.parentNode.previousSibling.previousSibling.previousSibling.
    previousSibling.innerHTML;

    let recive_mails = link.parentNode.previousSibling.previousSibling.previousSibling.innerHTML;
    console.log(recive_mails);
    let id = link.parentNode.previousSibling.previousSibling.previousSibling.
    previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
    // console.log(id);
    // console.log(gender);
    window.location.replace(`./form.php?userId=${id}&name=${username}&email=${email}&gender=${gender}&reciveMail=${recive_mails == "Yes" ? 1: 0}`);
}
