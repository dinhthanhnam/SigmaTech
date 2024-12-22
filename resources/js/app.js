// Đóng filter-item hiện tại khi click ra ngoài và bỏ chọn tất cả filter titles
document.addEventListener('click', function(e) {
    const currentFilterItem = document.querySelector('.js-filter-item.current');

    // Nếu click không nằm trong một filter item
    if (!e.target.closest('.js-filter-item') && currentFilterItem) {
      currentFilterItem.classList.remove('current'); // Xóa class 'current'

      // Bỏ chọn tất cả các filter-title trong filter-item hiện tại
      const selectedTitles = currentFilterItem.querySelectorAll('.js-filter-title.selected');
      selectedTitles.forEach(title => title.classList.remove('selected'));

      // Xóa class 'selected' của filter-item nếu không còn title nào được chọn
      currentFilterItem.classList.remove('selected');
    }
});

  // Xử lý click vào các filter item
document.querySelectorAll('.js-filter-item').forEach(filterItem => {
    filterItem.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation(); // Ngăn sự kiện truyền lên body

      // Toggle class 'current' cho filter-item hiện tại
      const isCurrent = this.classList.toggle('current');

      // Nếu có filter khác đang là 'current', bỏ class 'current' của filter đó
      document.querySelectorAll('.js-filter-item').forEach(item => {
        if (item !== this && item.classList.contains('current')) {
          item.classList.remove('current');
        }
      });

      // Kiểm tra nếu có ít nhất một js-filter-title được chọn
      const selectedTitles = this.querySelectorAll('.js-filter-title.selected');
      if (selectedTitles.length > 0) {
        this.classList.add('selected'); // Thêm class 'selected' nếu có ít nhất một title được chọn
      } else {
        this.classList.remove('selected'); // Xóa class 'selected' nếu không có title nào được chọn
      }
    });
});

  // Xử lý click vào các filter title
document.querySelectorAll('.js-filter-title').forEach(filterTitle => {
    filterTitle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation(); // Ngăn sự kiện truyền lên filter item

      const parentFilterItem = this.closest('.js-filter-item');
      const dataType = parentFilterItem.getAttribute('data-type');

      if (dataType === 'price') {
        // Nếu là loại price, chỉ cho phép chọn một
        parentFilterItem.querySelectorAll('.js-filter-title.selected').forEach(title => {
          title.classList.remove('selected'); // Bỏ chọn tất cả
        });
        this.classList.add('selected'); // Chọn item hiện tại
      } else {
        // Cho phép chọn nhiều item
        this.classList.toggle('selected'); // Toggle class 'selected'
      }

      // Kiểm tra nếu có ít nhất một js-filter-title được chọn
      const selectedTitles = parentFilterItem.querySelectorAll('.js-filter-title.selected');
      if (selectedTitles.length > 0) {
        parentFilterItem.classList.add('selected'); // Thêm class 'selected' nếu có ít nhất một title được chọn
      } else {
        parentFilterItem.classList.remove('selected'); // Xóa class 'selected' nếu không có title nào được chọn
      }
    });
});