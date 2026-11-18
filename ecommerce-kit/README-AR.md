# Little Store — قالبين لتدريس Laravel

## التشغيل
فك الضغط ثم افتح index.html بالمتصفح. لا تحتاج npm أو سيرفر أو اتصال إنترنت.
الواجهة إنجليزية بسيطة، والشرح هنا بالعربي. Bootstrap 5.3.3 وCSS والصور موجودين محليًا.

## المحتويات
- user: متجر، قائمة منتجات، 6 صفحات تفاصيل منتجات، سلة، Checkout، Login، Register، حساب المستخدم، طلباته وتفاصيلها.
- admin: Dashboard، منتجات وإضافة وتعديل كل منتج، أقسام وإضافة قسم، مستخدمون وإضافة وتعديل كل مستخدم، طلبات وتفاصيل كل طلب وتغيير الحالة.
- assets/css/style.css: تنسيقات بسيطة مشتركة.
- assets/images: 6 رسومات SVG محلية أصلية يمكن استبدالها بصور المنتجات.
- assets/vendor: Bootstrap CSS وJS ورخصته.
- database/ecommerce.sql: إنشاء 5 جداول وبيانات تجريبية.

## مهم: قالب ثابت فقط
كل ملف HTML كامل مستقل: head وnavbar وmain وfooter مكتوبين فيه فعليًا.
مفيش PHP أو Blade أو layouts أو includes أو كود باك إند أو build system.
تكرار Navbar وFooter مقصود عشان استخراج الـlayouts قدام الطلبة.
CSS خارجي مشترك؛ ده ملف أصول مش layout.
JavaScript الوحيد هو Bootstrap لتشغيل القائمة على الموبايل والـModal.
أزرار الحفظ والإضافة والحذف والدخول وشراء المنتجات تفتح رسالة Static preview فقط، ومش بتغير البيانات.
فورم التسجيل والدخول لا يعمل Authentication فعليًا. روابط الصفحات تعمل كمعاينة.
السلة ثابتة (شنطة وكوب بكمية واحدة لكل منتج)، ومش بتتحدث لما تضغط Add to cart.
الكروت والجداول والإحصائيات بيانات ثابتة، لا تقرأ SQL تلقائيًا.
My orders تمثل المستخدم Sara فقط. الـAdmin يعرض كل الطلبات.
Sign out preview رابط لصفحة الدخول فقط، مش Logout فعلي.

## استيراد SQL
1. افتح phpMyAdmin وأنشئ قاعدة جديدة فارغة باسم ecommerce_course بترميز utf8mb4_unicode_ci.
2. اختار القاعدة ثم Import ثم database/ecommerce.sql.
3. استورد مرة واحدة. الملف لا يمسح جداول موجودة ولا يحتوي DROP DATABASE أو DROP TABLE.
4. مستهدف MySQL 8+ أو MariaDB 10.4+؛ المستخدمون التجريبيون والطلبات وهميون.
5. الحسابات: admin@example.com للأدمن، sara@example.com وomar@example.com وmona@example.com للعملاء.
6. الباسورد التجريبي لكل الحسابات LearnShop123! مخزن كـbcrypt hash. لا تستخدم الحسابات التجريبية على موقع منشور.
7. لا تستورد users فوق جدول Laravel موجود بنفس الاسم. استخدم قاعدة فارغة أو حوّل المخطط إلى migrations خلال الدرس.
8. الملف لا يحتوي جداول sessions/cache/jobs. عند توصيل Laravel لاحقًا استخدم file للـsession/cache أو أنشئ جداول الإطار المطلوبة بشكل منفصل.

## الجداول والعلاقات
users: حسابات الدخول، role = admin أو customer. في مشروع المتجر استخدم customer بدل student.
categories: أقسام المنتجات.
products: كل منتج تابع لقسم واحد (category_id).
orders: كل طلب تابع لمستخدم واحد (user_id)، ومعاه عنوان المستلم وقت الطلب.
order_items: تفاصيل الطلب: المنتج والكمية وسعر الوحدة واسم المنتج وقت الشراء.
User hasMany Orders / Order belongsTo User.
Category hasMany Products / Product belongsTo Category.
Order hasMany OrderItems / OrderItem belongsTo Order and Product.
المنتج ممكن يظهر في طلبات كتير؛ order_items يمثل الربط بتفاصيل إضافية.
لا نحتاج carts table في النسخة التعليمية؛ ممكن تبني السلة لاحقًا بالـSession.
الأسعار DECIMAL لتخزين المبالغ. Order total = subtotal + shipping_cost.
مجموع quantity * unit_price في تفاصيل الطلب لازم يتحسب ويتراجع في الباك إند؛ القاعدة لا تحسب subtotal تلقائيًا.
اسم المنتج وسعره في order_items نسخة وقت الشراء عشان تعديل المنتج ما يغيرش تاريخ الطلب.
حذف منتج مستخدم في طلب أو مستخدم لديه طلبات ممنوع بـRESTRICT؛ حذف الطلب يحذف تفاصيله بـCASCADE.
كل بيانات الـHTML متوافقة مع بيانات SQL الابتدائية. تاريخ العرض مثال ثابت.

## ترتيب مقترح للتطبيق في السيشن
1. افتح user/index.html وuser/products.html وقارن الأجزاء المتكررة.
2. استخرج Layout للمتجر وواحدة للأدمن، وانقل Navbar/Footer إلى partials قدام الطلبة.
3. حوّل روابط assets والصفحات إلى asset() وroute().
4. ابدأ بعرض المنتجات والأقسام من الداتا بيز بدل القيم الثابتة.
5. فعّل إضافة وتعديل المنتجات ثم Auth وMiddleware للأدمن.
6. استخدم auth وis.admin في السيرفر؛ إخفاء روابط الإدارة وحده مش حماية.
7. احصر طلبات العميل في حسابه، وما تسمحش بفتح طلب عميل آخر عبر ID.
8. خلي Register العام ينشئ customer فقط، من غير قبول role من العميل.
9. حوّل أزرار type=button الخاصة بالمعاينة إلى submit عند توصيل الفورم، وأضف method/action وCSRF وValidation.
10. ابنِ السلة ثم إنشاء الطلب وتفاصيله داخل transaction، واحسب الإجماليات من أسعار قاعدة البيانات.

## مصادر
Bootstrap: https://getbootstrap.com/docs/5.3/getting-started/introduction/
Bootstrap forms: https://getbootstrap.com/docs/5.3/forms/overview/
MySQL foreign keys: https://dev.mysql.com/doc/refman/8.0/en/create-table-foreign-keys.html
الأكواد والتصميم والرسومات الأصلية هنا متاحة للاستخدام والتعديل في الكورس.
Bootstrap تحت MIT؛ الرخصة داخل assets/vendor/LICENSE-bootstrap.txt.
