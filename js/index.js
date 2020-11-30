const setCidInput = (cid) => {
        let cidInput = document.getElementById("cid");
        cidInput.value = cid;
};

const submitRecordsForm = () => {
    let recordsForm = document.getElementById("records-form");
    recordsForm.submit();
}
const editRecord = (cid) => {
    setCidInput(cid);
    submitRecordsForm();
}

