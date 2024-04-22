<?php
return [
    "btn_add_new" =>"إضافة حديد",
    "active" => "مفعل",
    "inactive" => "غير مفعل",
    "btn_save" => "حفظ",
    "btn_back" => "رجوع",
    'btn_close' => 'إغلاق',
    'btn_confirm' => 'تأكيد',
    "btn_update" => "تعديل",
    "edit_password" => "تعديل كلمة المرور",
    "msg_deleted_successfully"=>"تم جذف العنصر بنجاح",
    "msg_created_successfully" => "تم إضافة العنصر بنجاح",
    "msg_updated_successfully"  => "تم تعديل بيانات العنصر بنجاح",
    "msg_success" => "نجحت العملية",
    "btn_refresh" => 'إعادة تحميل',
    "modal_are_you_sure"  => "هل أنت متأكد من الاستمرار ?",
    "delete_model_msg" => "بحذف هذا العنصر لن نتمكن من الرجوع عن العملية مره أخرى .",
    "master_data" => "البيانات الأساسية",
    "select_status" => "إختر الحالة",
    'modal' => [
        'active_confirm_title' => 'تأكيد عمليه التفعيل',
        'active_confirm_msg' => 'هل أنت متأكد من إتمام عملية التفعيل?',
        'inactive_confirm_title' => 'تأكيد عملية الغاء التفعيل ',
        'inactive_confirm_msg' => 'هل أنت متأكد من إتمام إلغاء التفعيل?',
    ],
    "users" =>[
        "list" => "عرض المستخدمين",
        "field_name" => "الاسم",
        "field_email" => "البريد الإلكترونى",
        "phone_number" => "الهاتف",
        "field_status" => "الحالة",
        "field_action" => "الحدث",
        "role" => "الصلاحية",
        "field_password" => "كلمة المرور",
        "field_password_confirmation" => "تأكيد كلمة المرور"
    ],
    "roles" =>[
        'title' => 'الصلاحيات و الأدوار',
        'field_title'  => "العنوان",
        'field_action' => 'الحدث'
    ],
    "coursetypes" =>[
        'title' => 'أنواع الدورات',
        'add' => 'إضافة جديد',
        'edit' => 'تعديل نوع',
        'name'  => "الإسم",
        'status' => 'الحالة',
        'actions' => 'الحدث'
    ],
    "levels" =>[
        'title' => 'مستويات الدورة',
        'add' => 'مستوى جديد',
        'edit' => 'تعديل مستوى',
        'name'  => "الإسم",
        'status' => 'الحالة',
        'actions' => 'الحدث',
        'course' => 'الدورة',
        'start_date' => 'تاريخ البدايه',
        'period' => 'المدة',
        'period_type' => 'نوع المدة',
        'month' => "شهر",
        'day' => 'يوم',
        'hour' => 'ساعه'
    ],
    "paymenttypes" => [
        "title" => "عرض أنواع الدفع",
        "name"  => "الإسم",
        "field_action" => "الحدث",
        "status"  => "الحالة",
        'add'  => 'إضافة جديد',
        'edit'  => 'تعديل بيانات '

    ],
    "countries" =>[
        "title" => "عرض الدول",
        "name"  => "الاسم",
        "code" => "الكود",
        "field_action" => "الحدث",
        "status"  => "الحالة",
        "field_photo" => "الصورة",
        'add'  => 'إضافة دولة',
        'edit'  => 'تعديل دولة'
    ],
    "students" =>[
        "list" => "عرض الطلاب",
        "field_photo" => "الصورة",
        "field_country" => "الدولة",
        "field_join_date" => "تاريخ الانضمام",
        "field_first_name"  => "الإسم الأول",
        "field_last_name" => "الإسم الأخير",
        "field_name" => "الإسم",
        "field_course_number"  => "عدد الكورسات",
        "field_email" => "البريد الإلكترونى",
        "phone_number" => "الهاتف",
        "field_status" => "الحالة",
        "field_action" => "الحدث",
        "field_password" => "كلمة المرور",
        "field_password_confirmation" => "تأكيد كلمة المرور",
        'country_id'  => 'الدولة',
        'track' =>'المسار',
        "qualifications" => "المؤهلات",
        'about' => "عن الطالب",
        'field_photo' => 'الصورة',
        "userName" => "إسم المستخدم"
    ],
    'subscriptions' => [
        'title'  => 'الإشتراكات',
        "list" => "عرض الإشتراكات",
        "add"  => "إضافة إشتراك",
        "field_name" => "الإسم",
        "field_course"  => "الدورة",
        "field_email" => "البريد الإلكترونى",
        "field_track" => "المسار",
        "phone_number" => "الهاتف",
        "field_status" => "الحالة",
        "field_action" => "الحدث",
        "student" => "الطالب",
        "field_paymenttype"  => "مرفق الدفع"

    ],
    "courses"=>[
        "name"  => "إسم الدورة",
        "track"  => "المسار",
        "instructor" => "المحاضر",
        "student_number"  => "عدد الطلاب المشتركين",
        "price" => "السعر",
        "course_type" => "نوع الدورة",
        "level" => "المستوى",
        "actions"  => "الحدث",
        "field_published_at" => "تاريخ النشر",
        "period_type" => "نوع المدة",
        "period" => "المدة",
        "start_date" => "تاريخ البدء",
        "end_date" => "تاريخ الإنتهاء",
        "image" => "صورة الدورة",
        "promo_url" => "رابط برومو فیدیو",
        "background_image" => "صورة خلفية الدورة",
        "descriptions"  => "وصف الدورة",
        "directedTo"  => "الدورة موجه إلى",
        "goals" => "أهداف الدورة",
        "thumbinal_image" => "صورة "

    ],
    'dashboard' => [
        'student_number' => 'عدد الطلاب',
        'tickets_number'  => 'عدد التذاكر',
        'course_number'  => 'عدد الدورات',
        'instructor_number'  => 'عدد المحاضرين'

    ]
  
];