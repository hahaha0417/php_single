# 🧩 single  
**single worker / 單例專案體系**

<img src="/single.png" width="500" />

## 📌 已有功能
1. **前端：介紹頁**
2. **後端：backup base（備份核心功能）**

---

## 🎯 專案方針
1. **上班用**：提供工作時的輕量工具與簡化流程  
2. **lite 版本**：不追求完整框架，只保留必要功能  
3. **不規劃後續維護**：一次性工具，能跑即可  
4. **PHP 獨立型專案，仍維持 Singleton 架構**  
5. **降低 library 依賴**：盡量減少外部套件與自製 Library 的複雜度  

---

## 🚀 開啟 Worker（Queue Worker 啟動方式）
```bash
cd project/single/single
php artisan queue:work --queue=default
