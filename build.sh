#!/bin/bash

# Tên file zip đầu ra (mặc định lấy tên thư mục hiện tại)
DIR_NAME=$(basename "$PWD")
ZIP_NAME="${DIR_NAME}.zip"

echo "Đang tạo file: $ZIP_NAME..."

# Xóa file zip cũ nếu đã tồn tại
if [ -f "$ZIP_NAME" ]; then
    rm "$ZIP_NAME"
fi

# Chạy lệnh zip và loại bỏ các file/thư mục không cần thiết
zip -r "$ZIP_NAME" . -x \
    ".agent/*" ".agent" \
    ".claude/*" ".claude" \
    ".plans/*" ".plans" \
    "node_modules/*" "node_modules" \
    ".gitignore" \
    "package-lock.json" \
    "package.json" \
    "skills-lock.json" \
    "tailwind.config.js" \
    "yarn.lock" \
    "build-tw.sh" \
    "build.sh" \
    ".git/*" ".git" \
    "*.zip"

echo "Hoàn tất! Đã lưu thành: $ZIP_NAME"
