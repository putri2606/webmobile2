fetch('/api/packages')
    .then((response) => response.json())
    .then((data) => {
        const packageList = document.getElementById('packageList');
        packageList.innerHTML = data.map((pkg) => `
            <tr>
                <td>${pkg.name}</td>
                <td>${pkg.package_type}</td>
                <td>IDR ${pkg.price.toLocaleString()}</td>
                <td>${pkg.status}</td>
                <td>
                    <button class="btn btn-warning" onclick="editPackage(${pkg.id})">Edit</button>
                    <button class="btn btn-danger" onclick="deletePackage(${pkg.id})">Delete</button>
                </td>
            </tr>
        `).join('');
    });
