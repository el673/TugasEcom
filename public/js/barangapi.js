const api = {
    async login(email, password) {
        const response = await fetch("/api/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            credentials: "include",
            body: JSON.stringify({ email, password }),
        });

        const data = await response.json();
        if (!response.ok) throw new Error(data.message);
        localStorage.setItem("token", data.token);
        return data;
    },

    async fetchBarang() {
        const token = localStorage.getItem("token");
        if (!token) throw new Error("No authentication token");

        const response = await fetch("/api/barangs", {
            headers: {
                Accept: "application/json",
                Authorization: `Bearer ${token}`,
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            credentials: "include",
        });

        const data = await response.json();
        if (!response.ok) throw new Error(data.message);
        return data;
    },
};

async function displayBarang() {
    const container = document.getElementById("barang-data");
    try {
        await api.login("admin@gmail.com", "admin");
        const data = await api.fetchBarang();
        container.innerHTML = `<pre>${JSON.stringify(
            data.data,
            null,
            2
        )}</pre>`;
    } catch (error) {
        container.innerHTML = `<p class="error">Error: ${error.message}</p>`;
        console.error(error);
    }
}

document.addEventListener("DOMContentLoaded", displayBarang);
