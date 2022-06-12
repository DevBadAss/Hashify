import Request from "./ReqJS/Request.js";

const req = new Request({ url: "http://localhost:3000/api/hash.php?server-key=dev&query-value=TuPac&check-value=1aaffeb42bd939f1a8b7871bf81f252aa98a4d429bad7efe905211e261c5a78c", method: "GET", res: "json", type: "application/json", data: null });
req.pull(res => {
    console.log(res);
})