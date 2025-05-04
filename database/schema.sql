-- SQL schema for core NMS tables

CREATE TABLE devices (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45),
    hostname VARCHAR(255),
    status VARCHAR(20),
    type VARCHAR(50),
    is_managed BOOLEAN DEFAULT FALSE,
    location JSON NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE poll_results (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    device_id BIGINT UNSIGNED,
    latency FLOAT,
    packet_loss FLOAT,
    cpu_usage FLOAT,
    status VARCHAR(20),
    polled_at DATETIME,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (device_id) REFERENCES devices(id) ON DELETE CASCADE
);

CREATE TABLE alerts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    device_id BIGINT UNSIGNED,
    type VARCHAR(50),
    message TEXT,
    severity VARCHAR(20),
    status VARCHAR(20),
    triggered_at DATETIME,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (device_id) REFERENCES devices(id) ON DELETE CASCADE
);

CREATE TABLE settings (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(100) UNIQUE,
    `value` TEXT
);
