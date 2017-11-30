// SORT ADVERTISEMENTS
let advertisementOptions = {
    valueNames: ['model', 'brand', 'processor', 'ram', 'storage', 'cores', 'weight', 'price'],
};
let advertisementList = new List('advertisements', advertisementOptions);

/**
 * Update each table once filter parameters have been changed.
 */
let updateList = function() {
    let brand = $('.brandSelect').val();
    let os = $('.osSelect').val();
    let processor = $('.processorSelect').val();
    let ram = $('.ramSelect').val();
    let storage = $('.storageSelect').val();
    let displayLower = $('.displayLower').val();
    let displayUpper = $('.displayUpper').val();
    let priceUpper = $('.priceUpper').val();
    let priceLower = $('.priceLower').val();
    let touch = $('.touchSelect').val();
    let camera = $('.cameraSelect').val();

    // filter the appropriate list
    getList().filter(function(item) {
        return (_(brand).contains(item.values().brand) || !brand)
        && (_(os).contains(item.values().os) || !os)
        && (_(processor).contains(item.values().processor) || !processor)
        && (_(ram).contains(item.values().ram) || !ram)
        && (_(storage).contains(item.values().storage) || !storage)
        && ((Number(priceLower) < Number(item.values().price)) || !priceLower)
        && ((Number(priceUpper) > Number(item.values().price)) || !priceUpper)
        && ((Number(displayLower) < Number(item.values().display || item.values().size)) || !displayLower)
        && ((Number(displayUpper) > Number(item.values().display || item.values().size)) || !displayUpper)
        && ((_(touch).contains(item.values().touch)) || !touch)
        && ((_(camera).contains(item.values().camera)) || !camera);
    });
};

/**
 * Populates the select menus with appropriate items and sets up filters.
 */
$(function() {
    updateList();
    $('.displayLower').change(updateList);
    $('.displayUpper').change(updateList);
    $('.priceLower').change(updateList);
    $('.priceUpper').change(updateList);

    let allBrands = [];
    let allOS = [];
    let allProcessors = [];
    let allRam = [];
    let allStorage = [];
    let allTouch = [];
    let allCamera = [];

    // uses the underscore library
    _(getList().items).each(function(item) {
        allOS.push(item.values().os);
        allBrands.push(item.values().brand);
        allProcessors.push(item.values().processor);
        allRam.push(item.values().ram);
        allStorage.push(item.values().storage);
        allTouch.push(item.values().touch);
        allCamera.push(item.values().camera);
    });
    // remove any duplicates from all select properties
    allOS = _(allOS).uniq();
    allBrands = _(allBrands).uniq();
    allProcessors = _(allProcessors).uniq();
    allRam = _(allRam).uniq();
    allStorage = _(allStorage).uniq();
    allTouch = _(allTouch).uniq();
    allCamera = _(allCamera).uniq();
    // populate each select with properties
    _(allBrands).each(function(item) {
        $('.brandSelect').append('<option value="'+item+'">'+ item +'</option>');
    });
    _(allOS).each(function(item) {
        $('.osSelect').append('<option value="'+item+'">'+ item +'</option>');
    });
    _(allProcessors).each(function(item) {
        $('.processorSelect').append('<option value="'+item+'">'+ item +'</option>');
    });
    _(allRam).each(function(item) {
        $('.ramSelect').append('<option value="'+item+'">'+ item +'</option>');
    });
    _(allStorage).each(function(item) {
        $('.storageSelect').append('<option value="'+item+'">'+ item +'</option>');
    });
    _(allTouch).each(function(item) {
        $('.touchSelect').append('<option value="'+item+'">'+ item +'</option>');
    });
    _(allCamera).each(function(item) {
        $('.cameraSelect').append('<option value="'+item+'">'+ item +'</option>');
    });

    $('select').each(function() {
        $(this).multipleSelect({
            selectAll: false,
            onClick: updateList,
            placeholder: $(this).attr('placeholder'),
        });
    });
});

/**
 * Get the appropriate list.
 * Uses the type attribute added to each product table.
 * @return {Array} appropriate list object
 */
let getList = function() {
    let type = $('#prodTable').attr('type');
    switch (type) {
        case 'desktop':
            return desktopList;
        case 'laptop':
            return laptopList;
        case 'tablet':
            return tabletList;
        case 'monitor':
            return monitorList;
    }
};
