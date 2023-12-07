export const getClassNames = (attributes) => {
    const {
        gridColumnStartDesktop,
        gridColumnEndDesktop,
        gridColumnStartTablet,
        gridColumnEndTablet,
        gridColumnStartMobile,
        gridColumnEndMobile,
        // alignItem,
        // alignItemTablet,
        // alignItemMobile,
        // justifyItem,
        // justifyItemTablet,
        // justifyItemMobile,
        // stackOrder,
        // stacking,
        // gutter,
        // overlapLeft,
        // overlapRight,
        // marginTopDesktop,
        // marginRightDesktop,
        // marginBottomDesktop,
        // marginLeftDesktop,
        // marginTopTablet,
        // marginRightTablet,
        // marginBottomTablet,
        // marginLeftTablet,
        // marginTopMobile,
        // marginRightMobile,
        // marginBottomMobile,
        // marginLeftMobile
    } = attributes;
    return `xl:col-start-${gridColumnStartDesktop} xl:col-end-${gridColumnEndDesktop} md:col-start-${gridColumnStartTablet} md:col-end-${gridColumnEndTablet} col-start-${gridColumnStartMobile} col-end-${gridColumnEndMobile}`;
}