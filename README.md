# 🧩 single  
**single worker / 單例專案體系**

<img src="/single.png" width="500" />

## 📌 已有功能
1. **前端：介紹頁**
2. **後端：backup base（備份核心功能）**

---

## 🎯 專案方針
1. **上班用**
2. **lite 版本**
3. **不規劃後續維護** 
4. **使用單例**  
5. **降低 library 依賴**  

---

## 🚀 開啟 Worker（Queue Worker 啟動方式）
```bash
cd project/single/single
php artisan queue:work --queue=default
