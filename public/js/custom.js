function destroy(name, url) {
    const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    swal({
        title: `Are you sure, you want to delete ${name} ?`,
        text: `${name}!`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((status) => {
            if (!status) {
                throw null;
            }
            return fetch(url, {
                headers: {
                    "Content-Type": "application/json",
                    // "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token,
                },
                method: "delete",
                credentials: "same-origin",
                // body: JSON.stringify(customer)
            });
        })
        .then((results) => {
            return results.json();
        })
        .then((data) => {
            if (data.success === true) {
                return swal(data.message, {
                    icon: "success",
                }).then(() => location.reload());
            } else {
                swal(data.message, {
                    icon: "error",
                });
            }
        })
        .catch((err) => {
            if (err) {
                console.log(err);
                swal("Oh noes!", "The request failed!", "error");
            } else {
                swal.stopLoading();
                swal.close();
            }
        });
}
