/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var curPage = 1;
var baseUrl = "http://x.pms";
var sortBy = "";
var searchType = $('[name="search_type"]').val();
var searchContent = $('[name="search_content"]').val();
var nav_selected_val = "";
var nav_child_selected_val = "";
var EMPLOYEE = "employee";
var EMPLOYEE_CONTACT = "employee_contact";
var CLIENT = "client";
var SUPPLIER = "supplier";
var PROJECT = "project";
var PO = "po";
var pageType = EMPLOYEE;

function setPageType(type){
    pageType = type;
}
function setCurPage(page){
    curPage = page;
}
function setSortBy(name){
    sortBy = name;
}
function setNavSelectedValue(val){
    nav_selected_val = val;
}
function setNavChildSelectedValue(val){
    nav_child_selected_val = val;
}
function resetAllCondition(){
    searchType = "";
    searchContent = "";
    nav_selected_val = "";
    $('#ip_search_content').val('');
}
function resetCb(id){
    $('#'+id).children().each(function(){
        $(this).attr('selected',false);
    })
}
function nextPage(urlDataResult,tableId){
    $('.next_page').click(function(event){
        var next_page =  parseInt(curPage) + 1;
        if (curPage == $('.last_page').text()) {
            return false;
        } else {
            if (pageType == CLIENT) {
                var status = $('[name="status_filter"]').val();
                var location = $('[name="location_filter"]').val();
                $.ajax({
                    type: 'GET',
                    url: urlDataResult,
                    data: {'page': next_page,'search_type':searchType,'search_content':searchContent,'status':status,'location':location,'level_id':nav_selected_val}
                }).success(function(data){
                    setCurPage(next_page);
                    $('.page_number_selected').removeClass('page_number_selected');
                    $('.page_number').each(function(){
                        if($(this).text() == next_page) {
                            $(this).addClass('page_number_selected');
                        }
                    });
                    $('.tr_data').remove();
                    $('#'+tableId).append(data);
                });
            } else if (pageType == EMPLOYEE) {
                var status = $('[name="status_filter"]').val();
                var job_id = $('[name="job_filter"]').val();
                $.ajax({
                    type: 'GET',
                    url: urlDataResult,
                    data: {'page': next_page,'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val}
                }).success(function(data){
                    setCurPage(next_page);
                    $('.page_number_selected').removeClass('page_number_selected');
                    $('.page_number').each(function(){
                        if($(this).text() == next_page) {
                            $(this).addClass('page_number_selected');
                        }
                    });
                    $('.tr_data').remove();
                    $('#'+tableId).append(data);
                });
            } else if (pageType == EMPLOYEE_CONTACT) {
                var status = $('[name="status_filter"]').val();
                var job_id = $('[name="job_filter"]').val();
                var emp_type = EMPLOYEE_CONTACT;
                $.ajax({
                    type: 'GET',
                    url: urlDataResult,
                    data: {'page': next_page,'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val,'emp_type':emp_type}
                }).success(function(data){
                        setCurPage(next_page);
                        $('.page_number_selected').removeClass('page_number_selected');
                        $('.page_number').each(function(){
                            if($(this).text() == next_page) {
                                $(this).addClass('page_number_selected');
                            }
                        });
                        $('.tr_data').remove();
                        $('#'+tableId).append(data);
                    });
            }
        }
        event.preventDefault();
    });
}

function prevPage(urlDataResult,tableId){
    $('.previous_page').click(function(event){
        var prev_page =  parseInt(curPage) - 1;
        if (curPage == $('.first_page').text()) {
            return false;
        } else {
            if (pageType == CLIENT) {
                var status = $('[name="status_filter"]').val();
                var location = $('[name="location_filter"]').val();
                $.ajax({
                    type: 'GET',
                    url: urlDataResult,
                    data: {'page': prev_page,'search_type':searchType,'search_content':searchContent,'status':status,'location':location,'level_id':nav_selected_val}
                }).success(function(data){
                        setCurPage(prev_page);
                        $('.page_number_selected').removeClass('page_number_selected');
                        $('.page_number').each(function(){
                            if($(this).text() == prev_page) {
                                $(this).addClass('page_number_selected');
                            }
                        });
                        $('.tr_data').remove();
                        $('#'+tableId).append(data);
                    });
            } else if (pageType == EMPLOYEE) {
                var status = $('[name="status_filter"]').val();
                var job_id = $('[name="job_filter"]').val();
                $.ajax({
                    type: 'GET',
                    url: urlDataResult,
                    data: {'page': prev_page,'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val}
                }).success(function(data){
                        setCurPage(prev_page);
                        $('.page_number_selected').removeClass('page_number_selected');
                        $('.page_number').each(function(){
                            if($(this).text() == prev_page) {
                                $(this).addClass('page_number_selected');
                            }
                        });
                        $('.tr_data').remove();
                        $('#'+tableId).append(data);
                    });
            } else if (pageType == EMPLOYEE_CONTACT) {
                var status = $('[name="status_filter"]').val();
                var job_id = $('[name="job_filter"]').val();
                var emp_type = EMPLOYEE_CONTACT;
                $.ajax({
                    type: 'GET',
                    url: urlDataResult,
                    data: {'page': prev_page,'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val,'emp_type':emp_type}
                }).success(function(data){
                        setCurPage(next_page);
                        $('.page_number_selected').removeClass('page_number_selected');
                        $('.page_number').each(function(){
                            if($(this).text() == next_page) {
                                $(this).addClass('page_number_selected');
                            }
                        });
                        $('.tr_data').remove();
                        $('#'+tableId).append(data);
                    });
            }
        }
        event.preventDefault();
    });
}

function navEmpSelectedListener(){
    var urlInitPage = '';
    var urlDataResult = '';
    var tableId = '';
    $('.nav_item_parent_emp').click(function(event){
        var div_id = $(this).attr('divid');
        if (!$(this).hasClass('nav_selected')) {
            $('.nav_item_child_emp').remove();
            $('.nav_selected').removeClass('nav_selected');
            $(this).addClass('nav_selected');
            if(!jQuery.isEmptyObject(div_id)){
                showNavItemChildEmp(div_id);
            }
        }
        $('.nav_child_selected').removeClass('nav_child_selected');
        resetAllCondition();
        setNavSelectedValue(div_id);
        setNavChildSelectedValue('');
        if (pageType == EMPLOYEE) {
            resetCb('cb_status_filter');
            resetCb('cb_job_search');
            urlInitPage = baseUrl + '/employees/getTotalPageNum';
            urlDataResult = baseUrl + '/employees/getEmpResult';
            tableId = 'emp_list';
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': '1','div_id':nav_selected_val}
            }).success(function(data){
                    setCurPage(1);
                    $('.tr_data').remove();
                    $('#'+tableId).append(data);
                    reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
                });
        } else if (pageType == EMPLOYEE_CONTACT) {
            resetCb('cb_status_filter');
            resetCb('cb_job_search');
            urlInitPage = baseUrl + '/employees/getTotalPageNum';
            urlDataResult = baseUrl + '/employees/getEmpResult';
            tableId = 'emp_contact_list';
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': '1','div_id':nav_selected_val,'emp_type':EMPLOYEE_CONTACT}
            }).success(function(data){
                    setCurPage(1);
                    $('.tr_data').remove();
                    $('#'+tableId).append(data);
                    reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
                });
        }
        event.preventDefault();
    });
}
function showNavItemChildEmp(div_id){
    $.ajax({
        type: 'GET',
        url: baseUrl + '/department/getDeptByDiv',
        data: {'div_id':div_id}
    }).success(function(data){
            $('#nav_item_emp'+div_id).append(data);
            var urlInitPage = '';
            var urlDataResult = '';
            var tableId = '';
            $('.nav_item_child_emp').click(function(event){
                if ($(this).hasClass('nav_child_selected'))
                    return false;
                $('.nav_child_selected').removeClass('nav_child_selected');
                $(this).addClass('nav_child_selected');
                var dep_id = $(this).attr('depid');
                resetAllCondition();
                setNavChildSelectedValue(dep_id);
                if (pageType == EMPLOYEE) {
                    resetCb('cb_status_filter');
                    resetCb('cb_job_search');
                    urlInitPage = baseUrl + '/employees/getTotalPageNum';
                    urlDataResult = baseUrl + '/employees/getEmpResult';
                    tableId = 'emp_list';
                    $.ajax({
                        type: 'GET',
                        url: urlDataResult,
                        data: {'page': '1','div_id':nav_selected_val,'dep_id':nav_child_selected_val}
                    }).success(function(data){
                            setCurPage(1);
                            $('.tr_data').remove();
                            $('#'+tableId).append(data);
                            reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
                        });
                } else if (pageType == EMPLOYEE_CONTACT) {
                    resetCb('cb_status_filter');
                    resetCb('cb_job_search');
                    urlInitPage = baseUrl + '/employees/getTotalPageNum';
                    urlDataResult = baseUrl + '/employees/getEmpResult';
                    tableId = 'emp_contact_list';
                    $.ajax({
                        type: 'GET',
                        url: urlDataResult,
                        data: {'page': '1','div_id':nav_selected_val,'dep_id':nav_child_selected_val,'emp_type':EMPLOYEE_CONTACT}
                    }).success(function(data){
                            setCurPage(1);
                            $('.tr_data').remove();
                            $('#'+tableId).append(data);
                            reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
                        });
                }
                event.preventDefault();
            });
        });
}


function navSelectedListener(){
    var urlInitPage = '';
    var urlDataResult = '';
    var tableId = '';
    $('.nav_item').click(function(event){
        if ($(this).hasClass('nav_selected'))
            return false;
        $('.nav_selected').removeClass('nav_selected');
        $(this).addClass('nav_selected');
        resetAllCondition();
        if (pageType == CLIENT) {
            setNavSelectedValue($(this).attr('levelid'));
            resetCb('cb_status_filter');
            resetCb('cb_location_filter');
            urlInitPage = baseUrl + '/client/getTotalPageNum';
            urlDataResult = baseUrl + '/client/getClientResult';
            tableId = 'clients_list';
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': '1','level_id':nav_selected_val}
            }).success(function(data){
                setCurPage(1);
                $('.tr_data').remove();
                $('#'+tableId).append(data);
                reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
            });
        } else if (pageType == PROJECT) {
            setNavSelectedValue($(this).attr('statusid'));
            resetCb('cb_f_status_search');
            resetCb('cb_industry_search');
            urlInitPage = baseUrl + '/projects/getTotalPageNum';
            urlDataResult = baseUrl + '/projects/getProjectResult';
            tableId = 'projects_list';
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': '1','status_id':nav_selected_val}
            }).success(function(data){
                    setCurPage(1);
                    $('.tr_data').remove();
                    $('#'+tableId).append(data);
                    reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
                });
        }
        event.preventDefault();
    });
}

function initFrameNumberPage(){
    var urlInitPage = '';
    var urlDataResult = '';
    var tableId = '';
    if (pageType == CLIENT) {
        urlInitPage = baseUrl + '/client/getTotalPageNum';
        urlDataResult = baseUrl + '/client/getClientResult';
        tableId = 'clients_list';
    } else if(pageType == EMPLOYEE){
        urlInitPage = baseUrl + '/employees/getTotalPageNum';
        urlDataResult = baseUrl + '/employees/getEmpResult';
        tableId = 'emp_list';
    } else if(pageType == EMPLOYEE_CONTACT){
        urlInitPage = baseUrl + '/employees/getTotalPageNum';
        urlDataResult = baseUrl + '/employees/getEmpResult';
        tableId = 'emp_contact_list';
    } else if (pageType == PROJECT) {
        urlInitPage = baseUrl + '/projects/getTotalPageNum';
        urlDataResult = baseUrl + '/projects/getProjectResult';
        tableId = 'projects_list';
    }
    reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
}

function reloadFrameNumberPage(urlInitPage,urlDataResult,tableId){
    if (pageType == CLIENT){
        var status = $('[name="status_filter"]').val();
        var location = $('[name="location_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlInitPage,
            data: {'search_type':searchType,'search_content':searchContent,'status':status,'location':location,'level_id':nav_selected_val}
        }).success(function(data){
                $('.frame_page_number').html('');
                $('.frame_page_number').append(data);
                nextPage(urlDataResult,tableId);
                prevPage(urlDataResult,tableId);
                getClientDataFilter(urlDataResult,tableId,status,location);
            });
    } else if (pageType == EMPLOYEE) {
        var status = $('[name="status_filter"]').val();
        var job_id = $('[name="job_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlInitPage,
            data: {'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val}
        }).success(function(data){
                $('.frame_page_number').html('');
                $('.frame_page_number').append(data);
                nextPage(urlDataResult,tableId);
                prevPage(urlDataResult,tableId);
                getEmpDataFilter(urlDataResult,tableId,status,job_id);
            });
    } else if (pageType == EMPLOYEE_CONTACT) {
        var status = $('[name="status_filter"]').val();
        var job_id = $('[name="job_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlInitPage,
            data: {'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val}
        }).success(function(data){
                $('.frame_page_number').html('');
                $('.frame_page_number').append(data);
                nextPage(urlDataResult,tableId);
                prevPage(urlDataResult,tableId);
                getEmpContactDataFilter(urlDataResult,tableId,status,job_id);
            });
    } else if (pageType == PROJECT) {
        var f_status_id = $('[name="f_status_filter"]').val();
        var industry_id = $('[name="industry_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlInitPage,
            data: {'search_type':searchType,'search_content':searchContent,'f_status_id':f_status_id,'industry_id':industry_id,'status_id':nav_selected_val}
        }).success(function(data){
                $('.frame_page_number').html('');
                $('.frame_page_number').append(data);
                nextPage(urlDataResult,tableId);
                prevPage(urlDataResult,tableId);
                getProjectDataFilter(urlDataResult,tableId,f_status_id,industry_id);
            });
    }
}

function actionSearch(){
    searchType = $('[name="search_type"]').val();
    searchContent = $('[name="search_content"]').val();
    var urlInitPage = '';
    var urlDataResult = '';
    var tableId = '';
    if (pageType == CLIENT) {
        urlInitPage = baseUrl + '/client/getTotalPageNum';
        urlDataResult = baseUrl + '/client/getClientResult';
        tableId = 'clients_list';
        var status = $('[name="status_filter"]').val();
        var location = $('[name="location_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlDataResult,
            data: {'page': '1','search_type':searchType,'search_content':searchContent,'status':status,'location':location,'level_id':nav_selected_val}
        }).success(function(data){
            setCurPage(1);
            $('.tr_data').remove();
            $('#'+tableId).append(data);
            reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
        });
    } else if (pageType == EMPLOYEE) {
        urlInitPage = baseUrl + '/employees/getTotalPageNum';
        urlDataResult = baseUrl + '/employees/getEmpResult';
        tableId = 'emp_list';
        var status = $('[name="status_filter"]').val();
        var job_id = $('[name="job_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlDataResult,
            data: {'page': '1','search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val}
        }).success(function(data){
                setCurPage(1);
                $('.tr_data').remove();
                $('#'+tableId).append(data);
                reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
        });
    } else if (pageType == EMPLOYEE_CONTACT) {
        urlInitPage = baseUrl + '/employees/getTotalPageNum';
        urlDataResult = baseUrl + '/employees/getEmpResult';
        tableId = 'emp_contact_list';
        var status = $('[name="status_filter"]').val();
        var job_id = $('[name="job_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlDataResult,
            data: {'page': '1','search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val,'emp_type':EMPLOYEE_CONTACT}
        }).success(function(data){
                setCurPage(1);
                $('.tr_data').remove();
                $('#'+tableId).append(data);
                reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
            });
    } else if (pageType == PROJECT) {
        urlInitPage = baseUrl + '/projects/getTotalPageNum';
        urlDataResult = baseUrl + '/projects/getProjectResult';
        tableId = 'projects_list';
        var f_status_id = $('[name="f_status_filter"]').val();
        var industry_id = $('[name="industry_filter"]').val();
        $.ajax({
            type: 'GET',
            url: urlDataResult,
            data: {'page': '1','search_type':searchType,'search_content':searchContent,'f_status_id':f_status_id,'industry_id':industry_id,'status_id':nav_selected_val}
        }).success(function(data){
                setCurPage(1);
                $('.tr_data').remove();
                $('#'+tableId).append(data);
                reloadFrameNumberPage(urlInitPage,urlDataResult,tableId);
            });
    }
}

function getProjectDataFilter(urlDataResult,table_list_id,f_status_id,industry_id){
    $('.page_number').click(function(event){
        var _this = $(this);
        var page = $(this).text();
        if (page == curPage) {
            return false;
        } else {
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': page,'search_type':searchType,'search_content':searchContent,'status_id':nav_selected_val,'f_status_id':f_status_id,'industry_id':industry_id}
            }).success(function(data){
                    setCurPage(page);
                    $('.page_number_selected').removeClass('page_number_selected');
                    _this.addClass('page_number_selected');
                    $('.tr_data').remove();
                    $('#'+table_list_id).append(data);
                });
        }
        event.preventDefault();
    });
}

function getClientDataFilter(urlDataResult,table_list_id,status,location){
    $('.page_number').click(function(event){
        var _this = $(this);
        var page = $(this).text();
        if (page == curPage) {
            return false;
        } else {
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': page,'search_type':searchType,'search_content':searchContent,'status':status,'location':location,'level_id':nav_selected_val}
            }).success(function(data){
                setCurPage(page);
                $('.page_number_selected').removeClass('page_number_selected');
                _this.addClass('page_number_selected');
                $('.tr_data').remove();
                $('#'+table_list_id).append(data);
            });
        }
        event.preventDefault();
    });
}

function getEmpDataFilter(urlDataResult,table_list_id,status,job_id){
    $('.page_number').click(function(event){
        var _this = $(this);
        var page = $(this).text();
        if (page == curPage) {
            return false;
        } else {
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': page,'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val}
            }).success(function(data){
                    setCurPage(page);
                    $('.page_number_selected').removeClass('page_number_selected');
                    _this.addClass('page_number_selected');
                    $('.tr_data').remove();
                    $('#'+table_list_id).append(data);
                });
        }
        event.preventDefault();
    });
}
function getEmpContactDataFilter(urlDataResult,table_list_id,status,job_id){
    $('.page_number').click(function(event){
        var _this = $(this);
        var page = $(this).text();
        if (page == curPage) {
            return false;
        } else {
            $.ajax({
                type: 'GET',
                url: urlDataResult,
                data: {'page': page,'search_type':searchType,'search_content':searchContent,'status':status,'job_id':job_id,'div_id':nav_selected_val,'dep_id':nav_child_selected_val,'emp_type':EMPLOYEE_CONTACT}
            }).success(function(data){
                    setCurPage(page);
                    $('.page_number_selected').removeClass('page_number_selected');
                    _this.addClass('page_number_selected');
                    $('.tr_data').remove();
                    $('#'+table_list_id).append(data);
                });
        }
        event.preventDefault();
    });
}

function actionModifyDep(dep_id,old_val){
    var newVal = $('#ip_dep_val_' + dep_id).val();
    if (jQuery.isEmptyObject(newVal)) {
        showAlertRequired("Department name");
        $('#ip_dep_val_' + dep_id).focus();
    } else {
        if (newVal != old_val) {
            $.ajax({
                type: 'GET',
                url: baseUrl + '/department/modifyDept',
                data: {'dept_id' : dep_id, 'dept_name': newVal}
            }).success(function(msg){
                if (msg == 1){
                    alert("Modify successful!")
                    $('#td_org_dep_name_' + dep_id).html('- ' + newVal);
                    $('#org_dept_tool_' + dep_id).show();
                } else {
                    alert("Modify fail!")
                }
            });
        } else {
            $('#td_org_dep_name_' + dep_id).html('- ' + old_val);
            $('#org_dept_tool_' + dep_id).show();
        }
    }
}

function actionModifyDiv(div_id,old_val){
    var newVal = $('#ip_div_val_' + div_id).val();
    if (jQuery.isEmptyObject(newVal)) {
        showAlertRequired("Division name");
        $('#ip_div_val_' + div_id).focus();
    } else {
        if (newVal != old_val) {
            $.ajax({
                type: 'GET',
                url: baseUrl + '/division/modifyDiv',
                data: {'div_id' : div_id, 'div_name': newVal}
            }).success(function(msg){
                    if (msg == 1){
                        alert("Modify successful!")
                        $('#td_org_div_name_' + div_id).html(newVal);
                        $('#org_div_tool_' + div_id).show();
                    } else {
                        alert("Modify fail!")
                    }
                });
        } else {
            $('#td_org_div_name_' + div_id).html(old_val);
            $('#org_div_tool_' + div_id).show();
        }
    }
}

function actionCancelModifyDep(dep_id,old_val){
    $('#td_org_dep_name_' + dep_id).html('- ' + old_val);
    $('#org_dept_tool_' + dep_id).show();
}

function actionCancelModifyDiv(div_id,old_val){
    $('#td_org_div_name_' + div_id).html(old_val);
    $('#org_div_tool_' + div_id).show();
}

function showFormModifyDep(dep_id){
    var oldVal = $('#td_org_dep_name_' + dep_id).text().replace('- ','');
    var inputDepVal = '<div style="margin: auto">' +
        '<input id="ip_dep_val_' + dep_id + '" style="width: 250px" type="text" value="' + oldVal + '">' +
        '<i class="icon ion-ios7-checkmark-outline bt_crud_26 accept" style="margin-left: 10px;" onclick="actionModifyDep(\'' + dep_id + '\',\'' + oldVal + '\')"></i>'+
        '<i class="icon ion-ios7-close-outline bt_crud_26 cancel" style="margin-left: 35px;" onclick="actionCancelModifyDep(\'' + dep_id + '\',\'' + oldVal + '\')"></i>'+
        '</div>';
    $('#org_dept_tool_' + dep_id).hide();
    $('#td_org_dep_name_' + dep_id).text('');
    $('#td_org_dep_name_' + dep_id).html(inputDepVal);
}

function showFormModifyDiv(div_id){
    var oldVal = $('#td_org_div_name_' + div_id).text();
    var inputDepVal = '<input id="ip_div_val_' + div_id + '" style="width: 250px" type="text" value="' + oldVal + '">' +
        '<i class="icon ion-ios7-checkmark-outline bt_crud_26 accept" style="margin-left: 10px;" onclick="actionModifyDiv(\'' + div_id + '\',\'' + oldVal + '\')"></i>'+
        '<i class="icon ion-ios7-close-outline bt_crud_26 cancel" style="margin-left: 35px;" onclick="actionCancelModifyDiv(\'' + div_id + '\',\'' + oldVal + '\')"></i>';
    $('#org_div_tool_' + div_id).hide();
    $('#td_org_div_name_' + div_id).text('');
    $('#td_org_div_name_' + div_id).html(inputDepVal);
}

function showAlertRequired(element){
    alert(element + " are required!");
}

function actionCreateNewDept(div_id){
    var input_name = "new_dept_" + div_id;
    var dept_name = $('[name="' + input_name + '"]').val();
    if (jQuery.isEmptyObject(dept_name)) {
        showAlertRequired("Department name");
        $('[name="' + input_name + '"]').focus();
    } else {
        $.ajax({
            type: 'GET',
            url: baseUrl + '/department/createNewDept',
            data: {'div_id': div_id, 'dept_name': dept_name}
        }).success(function(msg){
            if (msg == 1) {
                alert("Create department '"+dept_name+"' successful!");
                location.reload();
            }
        })
    }
}
function actionCreateNewDiv(){
    var div_name = $('[name="new_div"]').val();
    if (jQuery.isEmptyObject(div_name)) {
        showAlertRequired("Division name");
        $('[name="new_div"]').focus();
    } else {
        $.ajax({
            type: 'GET',
            url: baseUrl + '/division/createNewDiv',
            data: {'div_name': div_name}
        }).success(function(msg){
            if (msg == 1) {
                alert("Create division '"+div_name+"' successful!");
                location.reload();
            }
        })
    }
}

function delDept(dept_id,dept_name){
    var confirm_del = confirm("Delete '" + dept_name + "' ?");
    if(confirm_del) {
        $.ajax({
            type: 'GET',
            url: baseUrl + '/department/deleteDept',
            data: {'dept_id': dept_id}
        }).success(function(msg){
            if (msg == 1) {
                location.reload();
            } else {
                alert("Delete '" + dept_name + "' fail!");
            }
        });
    }
}

function delDiv(div_id,div_name){
    var confirm_del = confirm("Delete '" + div_name + "' ?");
    if(confirm_del) {
        $.ajax({
            type: 'GET',
            url: baseUrl + '/division/deleteDiv',
            data: {'div_id': div_id}
        }).success(function(msg){
                if (msg == 1) {
                    location.reload();
                } else {
                    alert("Delete '" + div_name + "' fail!");
                }
            });
    }
}

function goMyPage(){
    window.location.href = baseUrl + "/employeesDetail/getEmpDetail";
}
function showListMyProject(){
    if (!$('#my_prj_content').hasClass('visible')){
        $('.visible').animate({
            opacity: 0
        },'fast',function(){
            $('.visible').remove();
            $.ajax({
                type: 'GET',
                url: baseUrl + '/jobassigns/getAllJobassignsByEmp'
            }).success(function(data){
                    var html = '<div id="my_prj_content" class="content_main" style="opacity: 0;"><div class="frame_title">My project</div>' +
                        '<table border="0" style="width: 1000px;">' +
                        '<th>Project</th>'+
                        '<th>Date - Task</th>'+
                        '<th>Quantity - Unit</th>'+
                        '<th>Hour</th>'+
                        '<th>Status</th>'+
                        '<th>Time Track</th>'+
                        '</tr>'+data+'</table>' +
                        '</div>';

                    $('.content').append(html);
                    $('#my_prj_content').animate({
                        opacity: 1
                    },'slow',function(){
                        $('#my_prj_content').addClass('visible');
                    });
                });
        });
    }
}

var newWindow;
function openNewWindow(url,title,w,h){
    if(typeof w === "undefined"){
        w = 800;
    }
    if (typeof h === "undefined") {
        h = 400;
    }
    newWindow = window.open(url,title,"width="+w+",height="+h);
    newWindow.focus();
}

function actionCancel(frameHide,frameShow){
    $('#'+frameHide).animate({
        opacity: 0
    },'fast',function(){
        $('#'+frameHide).remove();
        $('#'+frameShow).show();
        $('#'+frameShow).animate({
            opacity: 1
        },'slow',function(){
            $('#'+frameShow).addClass('visible');
        });
    });
}

function actionCreateJobAssign(){
    var prj_no = $('#prj_selected_name').attr('prjno');
    var emp_no = $('#emp_selected_name').attr('empNo');
    var task_id = $('[name="task"]').val();
    var act_id = $('[name="activities"]').val();
    var unit = $('[name="unit"]').val();
    var quantity = $('[name="quantity"]').val();
    var assigned_hour = $('[name="assigned_hour"]').val();
    var start_date = $('[name="year_start"]').val() + '-' + $('[name="month_start"]').val() + '-' + $('[name="day_start"]').val();
    var end_date = $('[name="year_end"]').val() + '-' + $('[name="month_end"]').val() + '-' + $('[name="day_end"]').val();
    var comment = $('[name="comments"]').val();

    $.ajax({
        type: 'GET',
        url: baseUrl + '/jobassigns/createJobassigns',
        data: {'prj_no':prj_no,'emp_no':emp_no,'task_id':task_id,'act_id':act_id,'unit':unit,'quantity':quantity,'assigned_hour':assigned_hour,'start_date':start_date,'end_date':end_date,'comment':comment}
    }).success(function(msg){
            if(msg == 1){
                alert("Create Jobassign successful!");
                $('#detail_job_assign').remove();
                $('#detail_create_job_assign').animate({
                    opacity: 0
                },'fast',function(){
//                    $('#detail_create_job_assign').remove();
                    showJobAssignFrame(prj_no);
                });
            } else {
                alert("Create Jobassign fail!");
            }
        });
}

function cbTaskSelectionChange(){
    var taskID = $('#cb_task').val();
    if (taskID != ''){
        $('#cb_activities').attr('disabled',false);
        $.ajax({
            type: 'GET',
            url: baseUrl + '/activities/getAllActivitiesCb',
            data: {'task_id': taskID}
        }).success(function(data){
                $('#cb_activities').html('<option value="">------Select------</option>' + data);
        });
    } else {
        $('#cb_activities').attr('disabled',true);
        $('#cb_activities').html('<option value="">Task has not been selected</option>');
    }
}

function createNewJobAssign(prj_no){
    var prj_name = $('#detail_prj_name').text();
    var form = '<div id="detail_create_job_assign" class="detail_content" style="opacity: 0">' +
        '<div class="frame_title" style="margin-top: 0">New JobAssign Registration</div>'+
        '<table border="0">' +
        '<tr class="form"><td class="form info_form">Project Name</td><td class="form value_form"><div class="value_selected" id="prj_selected_name" prjno="'+prj_no+'" style="font-size: medium;margin-top:2px">'+prj_name+'</div><button class="bt_select">Project Select</button></td></tr>' +
        '<tr class="form"><td class="form info_form">Employee Name</td><td class="form value_form"><div class="value_selected" id="emp_selected_name"></div><button class="bt_select" onclick="openNewWindow(\'' + baseUrl + '/employees/getAllEmpWindow?id=emp_selected_name\',\'Employees List\')">Employee Select</button></td></tr>' +
        '<tr class="form"><td class="form info_form">Task</td><td class="form value_form"><select id="cb_task" name="task" style="min-width: 300px" onchange="cbTaskSelectionChange()"><option value="">------Select------</option></select></td></tr>' +
        '<tr class="form"><td class="form info_form">Activities</td><td class="form value_form"><select id="cb_activities" name="activities" style="min-width: 200px" disabled><option>Task has not been selected</option></select></td></tr>' +
        '<tr class="form"><td class="form info_form">Unit</td><td class="form value_form"><select id="cb_unit" name="unit" style="min-width: 150px"></select></td></tr>' +
        '<tr class="form"><td class="form info_form">Quantity</td><td class="form value_form"><input type="text" name="quantity" style="width: 100px"></td></tr>' +
        '<tr class="form"><td class="form info_form">Assigned Hour</td><td class="form value_form"><input type="text" name="assigned_hour" style="width: 100px">&nbsp;Hour</td></tr>' +
        '<tr class="form"><td class="form info_form">Start Date</td><td class="form value_form"><select id="cb_year_start" name="year_start"></select>&nbsp;Year&nbsp;<select id="cb_month_start" name="month_start"></select>&nbsp;Month&nbsp;<select id="cb_day_start" name="day_start"></select>&nbsp;Day&nbsp;</td></tr>' +
        '<tr class="form"><td class="form info_form">End Date</td><td class="form value_form"><select id="cb_year_end" name="year_end"></select>&nbsp;Year&nbsp;<select id="cb_month_end" name="month_end"></select>&nbsp;Month&nbsp;<select id="cb_day_end" name="day_end"></select>&nbsp;Day&nbsp;</td></tr>' +
        '<tr class="form"><td class="form info_form">Comments</td><td class="form value_form"><textarea name="comments" style="width: 250px"></textarea></td></tr>'+
        '<tr style="height: 100px"><td colspan="2" class="form" style="text-align: center"><button class="bt_large" style="margin-right: 10px" onclick="actionCreateJobAssign()">Create</button><button class="bt_large" onclick="actionCancel(\'detail_create_job_assign\',\'detail_job_assign\')">Cancel</button></td></tr>' +
        '</table>' +
        '</div>';
    $('.visible').animate({
        opacity: 0
    },'fast',function(){
        $('.visible').hide();
        $('.visible').removeClass('visible');
        $('#detail_content_main').append(form);
        $.ajax({
            type: 'GET',
            url: baseUrl + '/unit/getAllUnitCb'
        }).success(function(data){
                $('#cb_unit').html(data);
            });
        $.ajax({
            type: 'GET',
            url: baseUrl + '/task/getAllTaskCb'
        }).success(function(data){
                $('#cb_task').append(data);
            });
        $('#cb_year_start').html(getYearCbData(new Date().getFullYear()));
        $('#cb_year_end').html(getYearCbData(new Date().getFullYear()));
        $('#cb_month_start').html(getMonthCbData(new Date().getMonth()));
        $('#cb_month_end').html(getMonthCbData(new Date().getMonth()));
        $('#cb_day_start').html(getDayCbData(new Date().getDate()));
        $('#cb_day_end').html(getDayCbData(new Date().getDate()));
        CKEDITOR.replace('comments',{
            skin: 'office2013'
        });
        $('#detail_create_job_assign').animate({
            opacity: 1
        },'slow',function(){
            $('#detail_create_job_assign').addClass('visible');
        });
    });
}

function showAllTimetrackByEmp(){
    if (!$('#timetrack_content').hasClass('visible')){
        $('.visible').animate({
            opacity: 0
        },'fast',function(){
            $('.visible').remove();
            $.ajax({
                type: 'GET',
                url: baseUrl + '/timetrack/getAllTimetrackByEmp'
            }).success(function(data){
                    var html = '<div id="timetrack_content" class="content_main" style="opacity: 0;right: 50px;min-width: 800px;"><div class="frame_title">My Time Track</div>' +
                        '<table border="0" style="width: 100%;">' +
                        '<th>No.</th>'+
                        '<th>Date</th>'+
                        '<th>Project</th>'+
                        '<th>Duration</th>'+
                        '<th>Task</th>'+
                        '<th>Activities</th>'+
                        '<th>Unit</th>'+
                        '<th>Quantity</th>'+
                        '<th>Action</th>'+
                        '</tr>'+data+'</table>' +
                        '</div>';

                    $('.content').append(html);
                    $('#timetrack_content').animate({
                        opacity: 1
                    },'slow',function(){
                        $('#timetrack_content').addClass('visible');
                    });
                });
        });
    }
}

function showJobAssignFrame(_prj_no){
    $('.prj_detail_selected').removeClass('prj_detail_selected');
    $('#prj_detail_menu_jobassign').addClass('prj_detail_selected');
    $('.visible').animate({
        opacity: 0
    },'fast',function(){
        $('.visible').hide();
        $('.visible').removeClass('visible');
        $.ajax({
            type: 'GET',
            url: baseUrl + '/jobassigns/getAllJobassigns',
            data: {prj_no: _prj_no}
        }).success(function(data){
                var html = '<div id="detail_job_assign" class="detail_content"><button id="bt_create_new_jobassign" onclick="createNewJobAssign(\'' + _prj_no + '\')">New JobAssign</button>' +
                    '<table id="tbl_job_assign" style="margin-top: 10px;width: 100%">'+
                    '<tr>' +
                    '<th>Employees</th>'+
                    '<th>Task</th>'+
                    '<th>Unit</th>'+
                    '<th>Quantity</th>'+
                    '<th>Date</th>'+
                    '<th>Hour</th>'+
                    '<th>Status</th>'+
                    '<th>Comment</th>'+
                    '<th>LQA</th>'+
                    '</tr>'+data+'</table>'
                    '</div>';
                if ($('#detail_job_assign').length <= 0){
                    $('#detail_content_main').append(html);
                }
                $('#detail_job_assign').show();
                $('#detail_job_assign').animate({
                    opacity: 1
                },'slow',function(){
                    $('#detail_job_assign').addClass('visible');
                });
            });
    });
}

function showBasicInfo(){
    $('.prj_detail_selected').removeClass('prj_detail_selected');
    $('#prj_detail_menu_basic').addClass('prj_detail_selected');
    if ($('#detail_basic_info').hasClass('visible')) {
        return false;
    }
    $('.visible').animate({
        opacity: 0
    },'fast',function(){
        $('.visible').remove();
        $('#detail_basic_info').show();
        $('#detail_basic_info').animate({
            opacity: 1
        },'slow',function(){
            $('#detail_basic_info').addClass('visible');
        });
    });
}

function goToPage(url){
    window.location.href = url;
}

var countries = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];

function listCountries(){
    var countryElement = '';
    countries.forEach(function(country) {
        countryElement = countryElement + '<option value="' + country + '">' + country + '</option>';
    });
    return countryElement;
}

function getHourData(){
    var curDate = new Date();
    var hours = curDate.getHours();
    return hours;
}

function getMinuteData(){
    var curDate = new Date();
    var minutes = curDate.getMinutes();
    return minutes;
}

function getYearCbData(year){
    var data = '';
//    var curDate = new Date();
//    var year = curDate.getFullYear();
    for(var i = (year + 1);i >= (year - 50); i--) {
        if (i == year){
            data = data + '<option value="' + i + '" selected>' + i + '</option>';
        } else {
            data = data + '<option value="' + i + '">' + i + '</option>';
        }
    }
    return data;
}

function getMonthCbData(month){
    var data = '';
//    var curDate = new Date();
//    var month = curDate.getMonth()+1;
    for(var i = 1;i <= 12; i++) {
        if (i == (month + 1)){
            if(i < 10) i = '0'+i;
            data = data + '<option value="' + i + '" selected>' + i + '</option>';
        } else {
            if(i < 10) i = '0'+i;
            data = data + '<option value="' + i + '">' + i + '</option>';
        }
    }
    return data;
}

function getDayCbData(day){
    var data = '';
//    var curDate = new Date();
//    var day = curDate.getDate();
    for(var i = 1;i <= 31; i++) {
        if (i == day){
            if(i < 10) i = '0'+i;
            data = data + '<option value="' + i + '" selected>' + i + '</option>';
        } else {
            if(i < 10) i = '0'+i;
            data = data + '<option value="' + i + '">' + i + '</option>';
        }
    }
    return data;
}

function empMngResult(){
    var sort_by = $('#cb_sort_by').val();
    var search_type = $('#cb_search_type').val();
    var search_content = $('#ip_search_content').val();
    $.ajax({
        type: 'GET',
        url: baseUrl + '/employees/getEmployeeResult',
        data: { sort_by : sort_by , search_type: search_type, search_content: search_content}
    }).success(function( msg ) {
            $('table.list_data').children().remove();
            $('table.list_data').html('<tr>'
                +'<th>No.</th>'
                +'<th>EmployeeNo.</th>'
                +'<th>Full Name</th>'
                +'<th>Division</th>'
                +'<th>Department</th>'
                +'<th>JobTitle</th>'
                +'<th>EntryDate</th>'
                +'<th></th>'
                +'</tr>'
                +msg);
        });
}

function changeFlagIcon(country_name){
    var flag = $('.flag_icon').css("background-image");
    var flagUrl = flag.split('/');
    var url = '';
    var count = 0;
    country_name = country_name.replace(/\s+/g,"-").replace(/'/g,"");
    flagUrl.forEach(function(elem){
        count++;
        if (count == flagUrl.length){
            url = url + country_name + '.png)';
        } else {
            url = url + elem + '/';
        }
    });

    $('.flag_icon').css('background-image',url);
//    alert(url);
}
$(document).ready(function() {
    $(".nav li").hover(function() {
        $(this).addClass('hover');
    }, function() {
        $(this).removeClass('hover');
    });
    $('#ip_search_content').keypress(function(e){
        var code = e.keyCode || e.which;
        if(code == 13) {
            actionSearch();
        }
    });
});

	