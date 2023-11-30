export const className = "row-start-5";

export const getClassNames = (attributes) => {
    const {
        gridColumnStartDesktop,
        gridColumnEndDesktop,
        gridColumnStartTablet,
        gridColumnEndTablet,
        gridColumnStartMobile,
        gridColumnEndMobile,
        alignItem,
        alignItemTablet,
        alignItemMobile,
        justifyItem,
        justifyItemTablet,
        justifyItemMobile,
        stackOrder,
        stacking,
        gutter,
        overlapLeft,
        overlapRight,
        marginTopDesktop,
        marginRightDesktop,
        marginBottomDesktop,
        marginLeftDesktop,
        marginTopTablet,
        marginRightTablet,
        marginBottomTablet,
        marginLeftTablet,
        marginTopMobile,
        marginRightMobile,
        marginBottomMobile,
        marginLeftMobile
    } = attributes;
    return `col-start-${gridColumnStartDesktop} col-end-${gridColumnEndDesktop}`;
}