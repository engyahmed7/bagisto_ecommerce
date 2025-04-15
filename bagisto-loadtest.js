import http from "k6/http";
import { check, sleep } from "k6";

export const options = {
    stages: [
        { duration: "1m", target: 100 },
        { duration: "3m", target: 100 },
        { duration: "1m", target: 0 },   
    ],
    thresholds: {
        http_req_duration: ["p(95)<500"], 
        http_req_failed: ["rate<0.01"],  
    },
};

const BASE_URL = "http://localhost:8000"; 

function visitHomepage() {
    const res = http.get(`${BASE_URL}/`);

    console.log(`Homepage include view all: ${res.body.includes("View All")}`);

    check(res, {
        "Homepage status is 200": (r) => r.status === 200,
        'Homepage contains "Welcome"': (r) => r.body.includes("Welcome"),
    });
}

function viewProduct() {
    const res = http.get(`${BASE_URL}/sleeveless-midi-dress-with-gathering`);

    console.log(`Product page contains Compare: ${res.body.inclmiudes("Compare")}`);
    check(res, {
        "Product page status is 200": (r) => r.status === 200,
        'Product page contains "Compare"': (r) => r.body.includes("Compare"),
    });
}

export default function () {
    visitHomepage();

    viewProduct();

    sleep(1); 
}
